<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 function __construct()
    {

         parent::__construct();
 //        $this->admin = $this->session->userdata('username');
 //        if ($this->admin == 'admin') {
 //            redirect(base_url('admin/index'));
 //        }
         $this->load->model('Admin_model');
    }
	public function index()
	{
        $this->load->view('admin/login');
	}

	public function logout()
	{
		 $this->session->sess_destroy();
		 redirect('admin');
	}

	public function home()
	{
		//$data['data'] = $this->Admin_model->user_count();
		//$data['data1'] = $this->Admin_model->category_count();
		//$data['data2'] = $this->Admin_model->post_count();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	
	public function child()
	{
		$data['data'] = $this->Admin_model->child();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/child',$data);
		$this->load->view('admin/footer');
	}

	 public function fetch_district($state_id)
 	{
  		$this->db->where('state_id', $state_id);
  		$this->db->order_by('district', 'ASC');
  		$query = $this->db->get('districts');
  		$output = '<option value="">Select District</option>';
  		foreach($query->result() as $row)
  		{
   			$output .= '<option value="'.$row->id.'">'.$row->district.'</option>';
  		}
  		return $output;
 	}


	public function addchild()
	{
		$path = DOCUMENTROOT."/public/photo/";
		if($_POST)
        {
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg,jpeg,png';
			/*$config['max_width']            = 1024;
			$config['max_height']           = 768;*/

			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload('files'))
			{
				echo   $error =  $this->upload->display_errors();
			}
			else
			{
					$image =  $this->upload->data();
					$data['files'] = $image['file_name'];
			}       
				   $data['title'] = $_POST['title'];
				   $data['category_id'] = $_POST['category_id'];
				   $data['body'] = $_POST['body'];
				   $data['access'] = $_POST['access'];
				   $data['user_id'] = $_POST['user_id'];
				   $data['is_published'] = $_POST['is_published'];
				   $data['in_menu'] = $_POST['in_menu'];
				   $data['position'] = $_POST['position'];

				   $last_id = $this->Admin_model->insert_child($data);
				   if($last_id)
				   {
					   echo "<script>alert('Child added');</script>";
				   }
               
			}
		$data['data1'] = $this->Admin_model->state();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add-child',$data);
		$this->load->view('admin/footer');
	}

	public function delete_articles()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->delete_articles($id);
		//echo "<script>alert('Article is Deleted');</script>";
		//echo "<script>window.location.href = '".base_url()."admin/articles';</script>";
		$this->session->set_flashdata('article_success', 'Record Deleted!');
    	redirect(base_url().'admin/articles');
	}

	public function articles_status()
	{
		$id = $this->uri->segment(3);
		$is_published = $this->uri->segment(4);
		if($is_published=='0')
		{
			$is_published=1;
		}
		else
		{
			$is_published=0;
		}
		echo $id.$is_published;
		$this->Admin_model->update_articles($id,$is_published);
		redirect('admin/articles');
	}

	public function edit_articles()
	{
		$path = DOCUMENTROOT."/public/photo/";
        if($_POST)
        {   
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'pdf';
			/*$config['max_width']            = 1024;
			$config['max_height']           = 768;*/

			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload('files'))
			{
				echo   $error =  $this->upload->display_errors();
			}
			else
			{
					$image =  $this->upload->data();
					$data['files'] = $image['file_name'];
			} 
            $data['title'] = $_POST['title'];
			$data['category_id'] = $_POST['category_id'];
			$data['body'] = $_POST['body'];
			$data['access'] = $_POST['access'];
			$data['user_id'] = $_POST['user_id'];
			$data['is_published'] = $_POST['is_published'];
			$data['in_menu'] = $_POST['in_menu'];
			$data['position'] = $_POST['position'];
            $id = $_POST['id'];
			$last_id = $this->Admin_model->update_article($id,$data);
			
			if($last_id)
			{
				$urli="admin/edit_articles/".$id;
				echo "<script>alert('Data is updated');</script>";
				echo "<script>window.location.href = '".base_url().$urli."';</script>";
			}

        }
		$id=$this->uri->segment(3);
		$data['data'] = $this->Admin_model->edit_articles($id);
		$data['data1'] = $this->Admin_model->users();
		$data['data2'] = $this->Admin_model->category();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/edit-articles',$data);
	}
}
