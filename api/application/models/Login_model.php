<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
		
        parent::__construct();
    }
	public function user_reg($array)
	{
		$result = $this->db->insert('user',$array);
		return $result;
	}
	public function user_login($email,$password)
	{
		//print_r($email);print_r($password);exit;
		$this->db->select('*');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$this->db->where('type','ADMIN');
		$res=$this->db->get('api_users')->row_array();
		return $res;
	}
	
	
}