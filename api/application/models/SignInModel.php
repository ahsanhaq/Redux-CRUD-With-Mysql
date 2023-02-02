<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SignInModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function user_info($login) 
	{  
	
	
		$this->db->select('*');
		$this->db->from('wp_volunteers');
		$login_data = array('email' => $login['email'],
		                    'password' => $login['password']
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
	public function user_infos($login) 
	{  
	
	
		$this->db->select('*');
		$this->db->from('wp_volunteers');
		$login_data = array('phone' => $login['phone'],
		                    'password' => $login['password']
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
	
	public function record($id) 
	{  
	
	
		$this->db->select('*');
		$this->db->from('wp_volunteers');
		$this->db->where('volunteer_id',$id); 
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
					
			return $row;
		} else {			
			return FALSE;
		}
  	} // does_user_exist
	
	public function user_loc($login) 
	{  
	
	
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('id',$login); 
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
					
			return $row;
		} else {			
			return FALSE;
		}
  	} // does_user_exist
	
	
	public function does_user_exist($login) 
	{  
		$this->db->select('*');
		$this->db->from('users');
		$login_data = array('email'        => $login['email'],
		                    'account_type' => $login['account_type']
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
		$query = $this->db->get('wp_volunteers');
		
		if($query->num_rows() > 0)
		{
			$row = $query->row();
					
			return $row;
		} else {			
			return FALSE;
		}
	}
	
	public function validate_forgotpass($email)
	 {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email); 
		$this->db->where('account_type','EMAIL'); 
		
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return $query->row();
		} else {			
			return NULL;
		}		 
	} // validate_forgotpass
	
	public function user_location($check) 
	{
		$this->db->select('*');
		$this->db->where($check); 
		$query = $this->db->get('location');
		if($query->num_rows() == 1)
		{
			return true;
		} else {			
			return FALSE;
		}
		
	}
	
	public function user_location_info($id) 
	{
		 $this->db->select('*')
         ->from('users')
         ->join('location', 'users.id = location.id');
		  $this->db->where('users.id !=', $id);
        return $result = $this->db->get()->result();
		
		
		
		
	}
	
	public function social_data($data) 
	{  
		if($this->user_exist($data) == true){
			
		}else{
		if ($this->db->insert('users', $data)) 
				{
					$insert_id = $this->db->insert_id();	
					$this->db->where('id', $insert_id);
					$query = $this->db->get('users');
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
		$this->db->update('users',$data);
		
		$this->db->where($check);	
		
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return FALSE;
		}
		
  	} 
}
?>