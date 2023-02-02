<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LikesModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function likeStream($data){

		$query = $this->db->insert('likes', $data);
		
			if($query) {
				return TRUE;
			}
			else{ 
				return FALSE;
			}
	}
	
	public function unLike($streamId,$userId) {
				$this->db->where('streamId', $streamId);
				$this->db->where('userId', $userId);
		  $query = $this->db->delete('likes');
		
			if($query) {
				return TRUE;
			}
			else{ 
				return FALSE;
			}
	}
	public function getLikes($stream_id = NULL){
		
		$this->db->where('streamId',$stream_id);
		return $this->db->get('likes')->result_array();
	}
	public function check_liked($stream_id = NULL,$user_id = NULL){
		$this->db->where('streamId',$stream_id);
		if($user_id){
			$this->db->where('userId',$user_id);
		} else {
			$this->db->where('userId',$this->session->userdata('user_id'));
		}
		
		$this->db->group_by('streamId');
		return $this->db->get('likes')->num_rows();
	}
	
}
?>