<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Admin_Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

		if(!empty($this->session->userdata('email')))
		{
			redirect('admin/home');
		}

	}

public function index()
{

	if(isset($_POST['email']))
		{
			$data = array(
                         
                         'email' => $_POST['email'],
                         'password' => md5($_POST['password'])
				);
         $result = $this->admin_model->login($data);
         $this->session->set_userdata(array(
         	    'username' => $result->username,
                'status'   => TRUE
                  ));
        if(!empty($this->session->userdata('username')))
		{
			redirect(base_url('admin/home'));
		}
         
		}
		$this->load->view('admin/login');
}

}

