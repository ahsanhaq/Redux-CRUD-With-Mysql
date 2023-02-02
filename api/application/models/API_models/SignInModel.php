<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SignInModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function does_user_exist($login) 
	{  
		$this->db->select('*');
		$this->db->from('user_info');
		$login_data = array('email'        => $login['email'],
		                    'password' => sha1($login['password'])
						   );
	
		$this->db->where($login_data); 
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
					
			return $row;
		} else {			
			return FALSE;
		}
  	} // does_user_exist
	
	public function user_exist($check) 
	{  
		$this->db->select('*');
		$this->db->where($check); 
		$query = $this->db->get('user_info');
		//print_r($this->db->last_query());exit;
		if($query->num_rows() == 1)
		{
			return true;
		} else {			
			return FALSE;
		}
	}
	
	public function social_data($data) 
	{  
		if($this->user_exist($data) == true){
			
		}else{
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
	
	public function updateUser($data,$check)
	{  
		$this->db->where($check);
		$this->db->update('user_info',$data);
		
		$this->db->where($check);	
		
		$query = $this->db->get('user_info');
		//print_r($this->db->last_query());exit;
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return FALSE;
		}
		
  	} 
}
?>