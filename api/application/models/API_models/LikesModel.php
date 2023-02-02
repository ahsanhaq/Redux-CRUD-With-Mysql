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
	
}
?>