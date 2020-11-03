<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function login($data)
	{
	   $email = $data['email'];
	   $password = $data['password'];	
       $query = $this->db->where('username',$email)
                         ->where('password',$password)
                         ->get('users');

                  return $query->row();       
    }

    public function state()
    {
        $this->db->select('id,state');
              $this->db->from('states');
              $this->db->order_by('id','desc');
        if(isset($id))
        {
          $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query->result_array();

    }

        public function child($id = NULL)
        {
        	$this->db->select('child.id,child.district_id,child.name,child.sex,child.dob,child.father_name,child.mother_name,child.photo,districts.district,states.state');
              $this->db->from('child');
              $this->db->join('districts', 'child.district_id = districts.id');
              $this->db->join('states', 'states.id = districts.state_id');
              $this->db->order_by('child.id','desc');
  			if(isset($id))
  			{
  				$this->db->where('id',$id);
  			}
  			$query = $this->db->get();
  			return $query->result_array();

        }


        public function insert_articles($data)
        {

        	$query = $this->db->insert('articles',$data);
        	$this->db->last_query();
        	return $this->db->insert_id();

        }

        public function delete_articles($id)
        {
            $this->db->where('id', $id);
			$this->db->delete('articles');
        }

        public function update_articles($id,$is_published)
        {
            $this->db->set('is_published',$is_published);        
            $this->db->where('id', $id);
            $this->db->update('articles');
            $this->db->last_query();
        }

        public function edit_articles($id)
        {
          $this->db->select('id,category_id,user_id,title,body,access,is_published,in_menu,position,files');
  			 $this->db->from('articles');
  			$this->db->where('id',$id);
  			$query = $this->db->get();
  			return $query->result_array();
        }

        public function update_article($id,$data)
        {

          $query = $this->db->where('id',$id)->update('articles',$data);
          
          return $query;

        }
}