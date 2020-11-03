<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function login($username,$password)
    {
        $q  = $this->db->select('password,id')->from('users')->where('username',$username)->get()->row();
        if($q == ""){
            return array('status' => 204,'message' => 'Username not found.');
        } else {
            $hashed_password = $q->password;
            $id              = $q->id;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
               $last_login = date('Y-m-d H:i:s');
               $token = crypt(substr( md5(rand()), 0, 7));
               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
               $this->db->trans_start();
               $this->db->where('id',$id)->update('users',array('last_login' => $last_login));
               $this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
            } else {
               return array('status' => 204,'message' => 'Wrong password.');
            }
        }
    }

    public function logout()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id',$users_id)->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

    public function state_all_data()
    {
        return $this->db->select('id,state')->from('states')->order_by('id','desc')->get()->result();
    }

    public function state_detail_data($id)
    {
        return $this->db->select('id,state')->from('states')->where('id',$id)->order_by('id','desc')->get()->row();
    }

    public function state_create_data($data)
    {
        $this->db->insert('states',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function state_update_data($id,$data)
    {
        $this->db->where('id',$id)->update('states',$data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function state_delete_data($id)
    {
        $this->db->where('id',$id)->delete('states');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

    public function district_all_data()
    {
        return $this->db->select('districts.id,districts.district,districts.state_id,states.state')->from('districts')->join('states', 'states.id = districts.state_id')->order_by('districts.id','desc')->get()->result();
    }

    public function district_detail_data($id)
    {
        return $this->db->select('districts.id,districts.district,districts.state_id,states.state')->from('districts')->join('states', 'states.id = districts.state_id')->where('districts.id',$id)->order_by('districts.id','desc')->get()->row();
    }

    public function district_create_data($data)
    {
        $this->db->insert('districts',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function district_update_data($id,$data)
    {
        $this->db->where('id',$id)->update('districts',$data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function district_delete_data($id)
    {
        $this->db->where('id',$id)->delete('districts');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

    public function child_all_data()
    {
        return $this->db->select('child.id,child.district_id,child.name,child.sex,child.dob,child.father_name,child.mother_name,child.photo,districts.district,states.state')->from('child')->join('districts', 'child.district_id = districts.id')->join('states', 'states.id = districts.state_id')->order_by('child.id','desc')->get()->result();
    }

    public function child_detail_data($id)
    {
        return $this->db->select('child.id,child.district_id,child.name,child.sex,child.dob,child.father_name,child.mother_name,child.photo,districts.district,states.state')->from('child')->join('districts', 'child.district_id = districts.id')->join('states', 'states.id = districts.state_id')->where('child.id',$id)->order_by('child.id','desc')->get()->row();
    }

    public function child_create_data($data)
    {
        $this->db->insert('child',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function child_update_data($id,$data)
    {
        $this->db->where('id',$id)->update('child',$data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function child_delete_data($id)
    {
        $this->db->where('id',$id)->delete('child');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

}