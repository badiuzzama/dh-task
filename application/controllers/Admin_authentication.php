<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Admin_Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('session');
		$this->load->library('encrypt');

		/*if(!empty($this->session->userdata('username')))
		{
			redirect('admin/home');
		}*/

	}

public function index()
{

	if(isset($_POST['email']))
		{
			$data = array(
                         
                         'email' => $_POST['email'],
                         'password' => md5($_POST['password'])
				);
         $result = $this->Admin_model->login($data);
         if($result>0)
         {
         	$this->session->set_userdata(array(
         	    		'email' => $result->username,
                		'status'   => TRUE
                  		));
         }
         else
         {
         	echo '<script>alert("Email & password not matching.")</script>';
         }

        if(!empty($this->session->userdata('email')))
		{
			redirect('Admin/home');
		}
         
		}
		$this->load->view('admin/login');
}

}

