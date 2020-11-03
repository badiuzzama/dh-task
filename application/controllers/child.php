<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class child extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        /*
        	$check_auth_client = $this->MyModel->check_auth_client();
		if($check_auth_client != true){
			die($this->output->get_output());
		}
		*/
    }

	public function index()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        	$response = $this->MyModel->auth();
		        	if($response['status'] == 200){
		        		$resp = $this->MyModel->child_all_data();
	    				json_output($response['status'],$resp);
		        	}
			}
		}
	}

	public function detail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        	$response = $this->MyModel->auth();
		        	if($response['status'] == 200){
		        		$resp = $this->MyModel->child_detail_data($id);
					json_output($response['status'],$resp);
		        	}
			}
		}
	}

	public function create()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        	$response = $this->MyModel->auth();
		        	$respStatus = $response['status'];
		        	if($response['status'] == 200){
					$params = json_decode(file_get_contents('php://input'), TRUE);
					if ($params['district_id'] == "" || $params['name'] == "" || $params['sex'] == "" || $params['dob'] == "" || $params['father_name'] == "" || $params['mother_name'] == "" || $params['photo'] == "") {
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'Name, Sex, DOB, Father Name, Mother Name, Photo & District ID can\'t empty');
					} else {
		        			$resp = $this->MyModel->child_create_data($params);
					}
					json_output($respStatus,$resp);
		        	}
			}
		}
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        	$response = $this->MyModel->auth();
		        	$respStatus = $response['status'];
				if($response['status'] == 200){
					$params = json_decode(file_get_contents('php://input'), TRUE);
					$params['updated_at'] = date('Y-m-d H:i:s');
					if ($params['district_id'] == "" || $params['name'] == "" || $params['sex'] == "" || $params['dob'] == "" || $params['father_name'] == "" || $params['mother_name'] == "" || $params['photo'] == "") {
						$respStatus = 400;
						$resp = array('status' => 400,'message' => 'Name, Sex, DOB, Father Name, Mother Name, Photo & District ID can\'t empty');
					} else {
		        			$resp = $this->MyModel->child_update_data($id,$params);
					}
					json_output($respStatus,$resp);
		       		}
			}
		}
	}

	public function delete($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        	$response = $this->MyModel->auth();
		        	if($response['status'] == 200){
		        		$resp = $this->MyModel->child_delete_data($id);
					json_output($response['status'],$resp);
		        	}
			}
		}
	}

}
