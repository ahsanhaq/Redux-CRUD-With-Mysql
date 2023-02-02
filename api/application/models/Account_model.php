<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Account_model extends CI_Model {
	function __construct() 
	{
		parent::__construct();
	}
	
	// print_r($this->db->last_query()); exit();
		
	public function create_user_account($data)
	{
		
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	} // create_user_account	
	
	public function get_account()
	{	
		$this->db->select('id,firstname,lastname,email,Profile_pic');
		$user_id=$this->session->userdata('uid');
		$this->db->where('id', $user_id);
		$query=$this->db->get('users');
		if($query->num_rows() == 1)
		{
			return $query->result();
		} else {
			return FALSE;			
		}	
	}
	
		public function update_account($filename)
	{	
	
		$userID=$this->session->userdata('uid');
		
		
			
		$this->db->where('id',$userID);
		$this->db->update('users',$filename); 
		
		
		if($this->db->affected_rows() > 0){
			return true;
			
		}else{
			return false;
		}
			
	}
	
	public function validate_email($email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return TRUE;
		} else {
			return FALSE;			
		}		
	} // validate_email
	
	
	public function validate_user_id($uid)
	{
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('id', $uid);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			return $row->id;
		} else {
			return FALSE;
exit;			
		}		
	} // validate_user_id
	
	
	public function account_activation($uid,$activation)
	{	
		$this->db->select('users.id,
						   users.firstname,
						   users.lastname,
						   users.email,
						   usertype.type AS usertype');
		$this->db->from('users');
		$this->db->join('usertype','usertype.id = users.usertype');
		$this->db->where('users.id', $uid);
		$this->db->where('users.activation', $activation);
		$this->db->where('users.status', 0);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			
			$this->db->set('status', 1);
			$this->db->set('activation', '');
			$this->db->where('id', $row->id);
			$this->db->update('users');
									
			$data = array('uid'       => $row->id,
						  'firstname' => $row->firstname,
						  'lastname'  => $row->lastname,
						  'email'     => $row->email,
						  'usertype'  => $row->usertype
						 );
			$this->session->set_userdata($data);
			return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
		} else {			
			return FALSE;
		}		 
	} // account_activation
	
	
		
	public function user_authentication($login)
	 {				
		$this->db->select('users.id,
		                   users.firstname,
						   users.lastname,
						   users.email,
						   usertype.type AS usertype');
		$this->db->from('users');
		$this->db->join('usertype','usertype.id = users.usertype');
		$login_data = array('email'    => $login['email'],
		                    'password' => MD5($login['password']),
							'status'   => 1);
		$this->db->where($login_data); 
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
            $data = array('uid'       => $row->id,
                    	  'firstname' => $row->firstname,
                    	  'lastname'  => $row->lastname,
						  'email'     => $row->email,
                    	  'usertype'  => $row->usertype,
);
            $this->session->set_userdata($data);
			// $this->session->set_userdata('email',$login['email']);
            return TRUE;
		} else {			
			return FALSE;
		}		 
	} // user_authentication
	
	
	
	public function validate_forgotpass($email)
	 {
		$this->db->select('users.id,
		                   users.email,
						   users.activation
						 ');
		$this->db->from('users');
		$this->db->where('email',$email); 
		$this->db->where('status',1); 
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return $query->row();
		} else {			
			return NULL;
		}		 
	} // validate_forgotpass
	
	
	public function activation_forgotpass($uid,$activation)
	{
		$this->db->select('users.id');
		$this->db->from('users');
		$this->db->where('id',$uid);
		$this->db->where('activation',$activation); 		 
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			return $row->id;
		} else {			
			return FALSE;
		}		 
	} // activation_forgotpass


	public function add_activation_code($uid,$activation)
	{
		$data = array('activation' => $activation,
                      'status'     => 0
			          );		
		$this->db->where('id', $uid);	// Where clause always comes first 
		$this->db->update('users', $data);		// after where clause then write update query		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 			 
	} // add_activation_code
	
		
	public function updatepassword($user)
	{
		$data = array('password'   => MD5($user['password']),
		              'pass'       => $user['password'],
					  'activation' => '',
					  'status'     => 1
					 );		
		$this->db->where('id', $user['uid']);	// Where clause always comes first 
		$this->db->update('users', $data);		// after where clause then write update query		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 			 
	} // updatepassword
	
	
	
	
} // Account_model (CI_Model)
?>