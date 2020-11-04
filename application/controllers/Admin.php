<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 function __construct()
    {

         parent::__construct();
         $this->admin = $this->session->userdata('username');
         if ($this->admin == 'admin') {
             redirect(base_url('admin/home'));
         }
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
		$data['data'] = $this->Admin_model->user();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer');
	}

	public function state()
	{
		$data['data'] = $this->Admin_model->state();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/state',$data);
		$this->load->view('admin/footer');
	}

	public function addstate()
	{
		if($_POST)
        {
				   $data['state'] = $_POST['state'];
				   $last_id = $this->Admin_model->insert_state($data);
				   if($last_id)
				   {
					   echo "<script>alert('state added');</script>";
				   }
               
			}

			redirect('admin/state');
	}

	public function edit_state()
	{
		if($_POST)
        {   
			$data['state'] = $_POST['state'];
            $id = $_POST['id'];
			$last_id = $this->Admin_model->update_state($id,$data);
			
			if($last_id)
			{
				$urli="admin/state/".$id;
				echo "<script>alert('Data is updated');</script>";
				echo "<script>window.location.href = '".base_url().$urli."';</script>";
			}

        }
		$id=$this->uri->segment(3);
		$data['data'] = $this->Admin_model->state($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/edit-state',$data);
	}

	public function district()
	{
		$data['data1'] = $this->Admin_model->state();
		$data['data'] = $this->Admin_model->district();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/district',$data);
		$this->load->view('admin/footer');
	}

	public function adddistrict()
	{
		if($_POST)
        {
        		   $data['state_id'] = $_POST['state_id'];
				   $data['district'] = $_POST['district'];
				   $last_id = $this->Admin_model->insert_district($data);
				   if($last_id)
				   {
					   echo "<script>alert('District added');</script>";
				   }
               
			}

			redirect('admin/district');
	}

	public function edit_district()
	{
		if($_POST)
        {   
        	$data['state_id'] = $_POST['state_id'];
			$data['district'] = $_POST['district'];
            $id = $_POST['id'];
			$last_id = $this->Admin_model->update_district($id,$data);
			
			if($last_id)
			{
				$urli="admin/district/".$id;
				echo "<script>alert('Data is updated');</script>";
				echo "<script>window.location.href = '".base_url().$urli."';</script>";
			}

        }
		$id=$this->uri->segment(3);
		$data['data1'] = $this->Admin_model->state();
		$data['data'] = $this->Admin_model->district($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/edit-district',$data);
	}

	public function child()
	{
		$data['data'] = $this->Admin_model->child();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/child',$data);
		$this->load->view('admin/footer');
	}

	public function fetch_district()
 	{
  		if($this->input->post('state_id'))
  		{
  			 echo $this->Admin_model->fetch_district($this->input->post('state_id'));
  		}
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
					$data['photo'] = $image['file_name'];
			}       
				   $data['name'] = $_POST['name'];
				   $data['district_id'] = $_POST['district_id'];
				   $data['sex'] = $_POST['sex'];
				   $data['dob'] = $_POST['dob'];
				   $data['father_name'] = $_POST['father_name'];
				   $data['mother_name'] = $_POST['mother_name'];

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

	public function delete_child()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->delete_child($id);
		//echo "<script>alert('Article is Deleted');</script>";
		//echo "<script>window.location.href = '".base_url()."admin/articles';</script>";
		$this->session->set_flashdata('article_success', 'Record Deleted!');
    	redirect(base_url().'admin/child');
	}

	public function view_child()
	{ 
		$id=$this->uri->segment(3);
		$data['data'] = $this->Admin_model->child($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/view-child',$data);
	}
}
