<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RatingModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function addRating($data){

		$query = $this->db->insert('streamRating', $data);
		
			if($query) {
				return TRUE;
			}
			else{ 
				return FALSE;
			}
	}
	public function checkRating($data){

		$query = $this->db->insert('streamRating', $data);
		
			if($query) {
				return TRUE;
			}
			else{ 
				return FALSE;
			}
	}
	public function updateRating($stream_id,$user_id,$rating){
		// echo $stream_id.' '.$user_id.' '.$rating;exit;
		$update = array(
			'rating' => $rating
		);
		
		$this->db->where('streamId',$stream_id);
		$this->db->where('userId',$user_id);
		$query = $this->db->update('streamRating', $update);
		
			if($query) {
				return TRUE;
			}
			else{ 
				return FALSE;
			}
	}
	
	public function getComments($streamId){
	$this->db->where('streamId',$streamId);
	$this->db->select("comments.*,user_info.id,user_info.fullName,user_info.city,user_info.displayPicture,user_info.accType")
					->from('comments')
					->join('user_info','user_info.id=comments.userId','left');
			$result=$this->db->get();
		
			if($result->num_rows() > 0){ 
				return $result->result_array();
			}else {
				return FALSE;
			} 
	}
	public function get_rating_five($stream_id){
		$this->db->select('SUM(rating) as total_sum,count(rating) as total_rating');
		$this->db->where('streamId',$stream_id);
		$this->db->where('rating',5);
		$result = $this->db->get('streamRating')->row_array();
		return $result;
	}
	public function get_rating_four($stream_id){
		$this->db->select('SUM(rating) as total_sum,count(rating) as total_rating');
		$this->db->where('streamId',$stream_id);
		$this->db->where('rating >=',4);
		$this->db->where('rating <',5);
		$result = $this->db->get('streamRating')->row_array();
		return $result;
	}
	public function get_rating_three($stream_id){
		$this->db->select('SUM(rating) as total_sum,count(rating) as total_rating');
		$this->db->where('streamId',$stream_id);
		$this->db->where('rating >=',3);
		$this->db->where('rating <',4);
		$result = $this->db->get('streamRating')->row_array();
		return $result;
	}
	public function get_rating_two($stream_id){
		$this->db->select('SUM(rating) as total_sum,count(rating) as total_rating');
		$this->db->where('streamId',$stream_id);
		$this->db->where('rating >=',2);
		$this->db->where('rating <',3);
		$result = $this->db->get('streamRating')->row_array();
		return $result;
	}
	public function get_rating_one($stream_id){
		$this->db->select('SUM(rating) as total_sum,count(rating) as total_rating');
		$this->db->where('streamId',$stream_id);
		$this->db->where('rating >=',1);
		$this->db->where('rating <',2);
		$result = $this->db->get('streamRating')->row_array();
		return $result;
	}
	public function get_rating_zero($stream_id){
		$this->db->select('SUM(rating) as total_sum,count(rating) as total_rating');
		$this->db->where('streamId',$stream_id);
		$this->db->where('rating >=',0);
		$this->db->where('rating <',1);
		$result = $this->db->get('streamRating')->row_array();
		return $result;
	}
}
?>