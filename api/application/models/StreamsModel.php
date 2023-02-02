<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class StreamsModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function liveStreams(){
		
		$result=$this->db->query("SELECT
								streams.id,
								streams.streamName,
								streams.thumb,
								streams.userId,
								streams.city,
								streams.streamStatus,
								user_info.fullName,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'live'
								GROUP BY streams.id" );
		
		
		return $result->result_array();
		
	}
	
	public function archivedStreams(){
			$result=$this->db->query("SELECT
			streams.streamName,streams.id,
			streams.thumb,
			streams.userId,
			streams.city,
			streams.streamStatus,
			user_info.fullName,
			stream_views.total_views,
			(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
			FROM
			`streams`
			LEFT JOIN
			likes
			ON likes.streamId=streams.id
			LEFT JOIN
			stream_views
			ON stream_views.stream_id=streams.id
			LEFT JOIN
			user_info
			ON
			user_info.id=streams.userId
			WHERE streams.streamStatus = 'recorded'
			GROUP BY streams.id
			ORDER BY streams.id DESC
			LIMIT 8
			" );
			return $result->result_array();
		
	}
	
	
	public function trendingStreams(){
		
		$result=$this->db->query("SELECT
								streams.streamName,streams.id,
								streams.thumb,
								streams.userId,
								streams.city,
								streams.streamStatus,
								user_info.fullName,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								GROUP BY streams.id
								ORDER BY stream_views.total_views DESC
								LIMIT 8
								" );
	
		return $result->result_array();
		
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
			$this->db->select("streams.*,user_info.fullName,user_info.displayPicture,user_info.accType,stream_views.total_views")
					->from('streams')
					->join('user_info','user_info.id=streams.userId','left')
					->join('stream_views','stream_views.stream_id=streams.id','left');
			$result=$this->db->get();
		
			if($result->num_rows() > 0){ 
				return $result->row_array();
			}else {
				return FALSE;
			} 
		}	
	public function latest_stream(){
		$result=$this->db->query("SELECT
								streams.streamName,streams.id,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								user_info.displayPicture,
								user_info.accType,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'recorded'
								GROUP BY streams.id
								ORDER BY streams.id DESC	
								" );
		
		
		return $result->row_array();
	}
	public function liveStreams_recent(){
		
		$result=$this->db->query("SELECT
								streams.id,
								streams.streamName,
								streams.thumb,
								streams.userId,
								user_info.displayPicture,
								user_info.accType,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'live'
								GROUP BY streams.id
								ORDER BY streams.id DESC
								LIMIT 3
								" );
		
		
		return $result->result_array();
		
	}
	
	public function archivedStreams_recent(){
		
		$result=$this->db->query("SELECT
								streams.streamName,streams.id,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								user_info.displayPicture,
								user_info.accType,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'recorded'
								GROUP BY streams.id
								ORDER BY streams.id DESC
								LIMIT 3
								" );
		
		
		return $result->result_array();
		
	}
	
	public function trendingStreams_recent(){
		
		$result=$this->db->query("SELECT
								streams.id,
								streams.streamName,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'recorded'
								GROUP BY streams.id
								ORDER BY stream_views.total_views DESC
								LIMIT 8
								" );
		
	
		return $result->result_array();
		
	}
	public function views($stream_id){
		/* check if stream exists insert else update */
		$this->db->where('stream_id',$stream_id);
		$exists = $this->db->get('stream_views')->row_array();
		if($exists){
			$views = $exists['total_views'];
			$update_array = array(
				'total_views' => 1+$views,
			);
			$this->db->where('stream_id',$stream_id);
			return $this->db->update('stream_views',$update_array);
		} else {
			$insert_array = array(
				'total_views' => 1,
				'stream_id' => $stream_id,
			);
			return $this->db->insert('stream_views',$insert_array);
		}
	}
	public function archivedStreams2(){
			$result=$this->db->query("SELECT
			streams.streamName,streams.id,
			streams.thumb,
			streams.userId,
			streams.streamStatus,
			user_info.fullName,
			user_info.city,
			user_info.email,
			user_info.accType,
			user_info.account_id,
			stream_views.total_views,
			(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes,
			(SELECT count(*) FROM comments WHERE streamId = streams.id) as totalcomments
			FROM
			`streams`
			LEFT JOIN
			likes
			ON likes.streamId=streams.id
			LEFT JOIN
			comments
			ON comments.streamId=streams.id
			LEFT JOIN
			stream_views
			ON stream_views.stream_id=streams.id
			LEFT JOIN
			user_info
			ON
			user_info.id=streams.userId
			WHERE streams.streamStatus = 'recorded'
			GROUP BY streams.id
			ORDER BY streams.id DESC
			
			" );
			return $result->result_array();
		
	}
	public function liveStreams2(){
		
		$result=$this->db->query("SELECT
								streams.id,
								streams.streamName,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								user_info.email,
								user_info.accType,
								user_info.account_id,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes,
								(SELECT count(*) FROM comments WHERE streamId = streams.id) as totalcomments
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								comments
								ON comments.streamId=streams.id
								LEFT JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.streamStatus = 'live'
								GROUP BY streams.id
								ORDER BY streams.id DESC
								" );
		
		
		return $result->result_array();
		
	}
	public function trendingStreams2(){
		
		$result=$this->db->query("SELECT
								streams.streamName,streams.id,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								user_info.email,
								user_info.accType,
								user_info.account_id,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes,
								(SELECT count(*) FROM comments WHERE streamId = streams.id) as totalcomments
								
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								comments
								ON comments.streamId=streams.id
								JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								JOIN
								user_info
								ON
								user_info.id=streams.userId
								GROUP BY streams.id
								ORDER BY stream_views.total_views DESC
								" );
	
		return $result->result_array();
		
	}
	public function get_stream($stream_id){
		$result=$this->db->query("SELECT
								streams.streamName,streams.id,
								streams.thumb,
								streams.userId,
								streams.streamStatus,
								user_info.fullName,
								user_info.city,
								user_info.email,
								user_info.accType,
								user_info.account_id,
								stream_views.total_views,
								(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes,
								(SELECT count(*) FROM comments WHERE streamId = streams.id) as totalcomments
								FROM
								`streams`
								LEFT JOIN
								likes
								ON likes.streamId=streams.id
								LEFT JOIN
								comments
								ON comments.streamId=streams.id
								LEFT JOIN
								stream_views
								ON stream_views.stream_id=streams.id
								LEFT JOIN
								user_info
								ON
								user_info.id=streams.userId
								WHERE streams.id = ".$stream_id."
								GROUP BY streams.id
								ORDER BY stream_views.total_views DESC
								" );
	
		return $result->result_array();
		
	}
	public function my_streams($user_id){
		$result=$this->db->query("SELECT
			streams.streamName,streams.id,
			streams.thumb,
			streams.userId,
			streams.streamStatus,
			user_info.fullName,
			user_info.city,
			user_info.email,
			user_info.accType,
			user_info.account_id,
			user_info.id as user_id,
			stream_views.total_views,
			(SELECT count(*) FROM likes WHERE streamId = streams.id) as totallikes,
			(SELECT count(*) FROM comments WHERE streamId = streams.id) as totalcomments
			FROM
			`streams`
			LEFT JOIN
			likes
			ON likes.streamId=streams.id
			LEFT JOIN
			comments
			ON comments.streamId=streams.id
			LEFT JOIN
			stream_views
			ON stream_views.stream_id=streams.id
			LEFT JOIN
			user_info
			ON
			user_info.id=streams.userId
			WHERE user_info.id = ".$user_id."
			GROUP BY streams.id
			ORDER BY stream_views.total_views DESC
			"
		);
	
		return $result->result_array();
	}
	public function add_escalation($stream_id,$user_id){
		
		$data = array(
			'user_id' =>$user_id,
			'stream_id' => $stream_id,
			'value' => 1,
		);
		return $this->db->insert('user_escalations',$data);
		
	}
	public function check_escalated($stream_id){
		$this->db->where('stream_id',$stream_id);
		$this->db->where('user_id',$this->session->userdata('user_id'));
		return $this->db->get('user_escalations')->num_rows();
	}

}
?>	