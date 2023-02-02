<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SignupModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function register($data){

			if ($this->db->insert('user_info', $data)) 
				{
					$insert_id = $this->db->insert_id();	
					$this->db->where('id', $insert_id);
					$query = $this->db->get('user_info');
					if($query->num_rows() > 0) 
						return $query->row();
					else 
						return FALSE;
				} else {
					return false;
				}
	}
	
	
}
?>	