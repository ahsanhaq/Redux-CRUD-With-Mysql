<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProfileModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	
	public function user_escalater(){
	
		$this->db->select('user_info.*');
		$this->db->where('escalated',1);
		$this->db->where('device_type !=','web');
		$this->db->where('deviceId !=', '');
		$this->db->join("user_info", "user_info.id = user_setting.user_id");
		$this->db->group_by('user_info.id');
        $q = $this->db->get("user_setting");
        if($q->num_rows() > 0)
        {
            return $q->result_array();

        }
        return array();
	
	}
	
	public function user_archived(){
	
		$this->db->select('user_info.*');
		$this->db->where('archived',1);
		$this->db->where('device_type !=','web');
		$this->db->where('deviceId !=', '');
		$this->db->join("user_info", "user_info.id = user_setting.user_id");
		$this->db->group_by('user_info.id');
        $q = $this->db->get("user_setting");
        if($q->num_rows() > 0)
        {
            return $q->result_array();

        }
        return array();
	
	}
	
	
	public function user_trending(){
	
		$this->db->select('user_info.*');
		$this->db->where('trending',1);
		$this->db->where('device_type !=','web');
		$this->db->where('deviceId !=', '');
		$this->db->join("user_info", "user_info.id = user_setting.user_id");
		$this->db->group_by('user_info.id');
        $q = $this->db->get("user_setting");
        if($q->num_rows() > 0)
        {
            return $q->result_array();

        }
        return array();
	
	}

}
?>	