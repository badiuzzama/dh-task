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
                         ->where('passcode',$password)
                         ->get('users');

                   return $query->row();

    }

    public function user($id=NULL)
  {
    $this->db->select('*');
              $this->db->from('users');
        if(isset($id))
        {
          $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query->result_array();       
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

    public function state($id=NULL)
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

    public function insert_state($data)
        {

          $query = $this->db->insert('states',$data);
          $this->db->last_query();
          return $this->db->insert_id();

        }

       public function update_state($id,$data)
        {

          $query = $this->db->where('id',$id)->update('states',$data);
          
          return $query;

        }


        public function district($id=NULL)
    {
        $this->db->select('districts.id,districts.district,districts.state_id,states.state');
              $this->db->from('districts');
              $this->db->join('states','districts.state_id=states.id');
              $this->db->order_by('districts.id','desc');
        if(isset($id))
        {
          $this->db->where('districts.id',$id);
        }
        $query = $this->db->get();
        return $query->result_array();

    }

    public function insert_district($data)
        {

          $query = $this->db->insert('districts',$data);
          $this->db->last_query();
          return $this->db->insert_id();

        }

        public function update_district($id,$data)
        {

          $query = $this->db->where('id',$id)->update('districts',$data);
          
          return $query;

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
  				$this->db->where('child.id',$id);
  			}
  			$query = $this->db->get();
  			return $query->result_array();

        }


        public function insert_child($data)
        {

        	$query = $this->db->insert('child',$data);
        	$this->db->last_query();
        	return $this->db->insert_id();

        }
}