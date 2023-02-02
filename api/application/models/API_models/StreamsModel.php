<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class StreamsModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function liveStreams(){
		
		$result=$this->db->query("SELECT
								streams.streamName,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'live'
								GROUP BY streams.id" );
		
		
		return $result->result();
		
	}
	
	public function archivedStreams(){
		
		$result=$this->db->query("SELECT
								streams.id,
								streams.streamName,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'recorded'
								GROUP BY streams.id" );
		
		
		return $result->result();
		
	}
	
	public function trendingStreams(){
		
		$result=$this->db->query("SELECT
								streams.streamName,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'live'
								GROUP BY streams.id" );
		
	
		return $result->result();
		
	}
	
	public function isLikes(){
		
		$this->db->select("streams.*,likes.*,user_info.id,user_info.fullName,user_info.city")
					->from('likes')
					->join('streams','streams.id = likes.streamId','left')
					->join('user_info','user_info.id=streams.userId','left');
		$result=$this->db->get();
		return $result->result();
		
	}
		
		public function updateStreams($data,$streamName){
		
		
		$this->db->where('streamName',$streamName);
		$update = $this->db->update('streams', $data);
		if($this->db->affected_rows() > 0){
				return TRUE;
			} else {
				return FALSE;
			}
		
		}
	public function addStream($data){
		
		if ($this->db->insert('streams', $data)) 
				{
					$insert_id = $this->db->insert_id();	
					$this->db->where('id', $insert_id);
					$query = $this->db->get('streams');
					if($query->num_rows() > 0) 
						return $query->row();
					else 
						return FALSE;
				} else {
					return false;
				}
		
		}
	public function getStream($streamId){
		
			$this->db->where('streams.id',$streamId);
			$this->db->select("streams.*,user_info.fullName,user_info.city")
					->from('streams')
					->join('user_info','user_info.id=streams.userId','left');
			$result=$this->db->get();
		
			if($result->num_rows() > 0){ 
				return $result->row();
			}else {
				return FALSE;
			} 
		}	
	
}
?>	