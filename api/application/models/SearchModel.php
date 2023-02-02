<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SearchModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function city(){
		$this->db->select('id,city');
		
		$this->db->where('city !=','');
		$this->db->group_by('city');
		$this->db->order_by('id');
		return $this->db->get('uk_police_stations')->result_array();
	}
	public function stations(){
		$this->db->select('id,name');
		
		$this->db->where('name !=','');
		$this->db->group_by('name');
		$this->db->order_by('id');
		$this->db->limit('500');
		return $this->db->get('uk_police_stations')->result_array();
	}
	public function city_stations($city){
		$this->db->select('id,name,city');
		$this->db->where('name !=','');
		$this->db->where('city ',$city);
		$this->db->group_by('name');
		$this->db->order_by('id');
		return $this->db->get('uk_police_stations')->result_array();
	}
	public function streams($city,$station){
		$this->db->select('streams.streamName,streams.id,
			streams.thumb,
			streams.userId,
			streams.streamStatus,
			user_info.fullName,
			user_info.city,
			user_info.email,
			user_info.accType,user_info.displayPicture,
			user_info.account_id,
			user_info.id as user_id,
			stream_views.total_views,(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes,(SELECT count(*) FROM comments WHERE streamId = streams.id) as totalcomments');
		if($city != 'all'){
			$this->db->where('uk_police_stations.city',$city);
		}
		if($station != 'all'){
			$this->db->where('uk_police_stations.name',$station);
		}
		$this->db->join('streams','streams.station_id = uk_police_stations.id');
		$this->db->join('user_info','user_info.id = streams.userId');
		$this->db->join('comments','comments.streamId = streams.Id','left');
		$this->db->join('likes','likes.streamId = streams.Id','left');
		$this->db->join('stream_views','stream_views.stream_id = streams.Id','left');
		$this->db->group_by('streams.id');
		return $this->db->get('uk_police_stations')->result_array();
		
	}
}
?>