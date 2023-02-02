<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CommentModel extends CI_Model {
	function __construct() 
	{
    	parent::__construct();
  		
	}
	
	public function addComment($data){

		$query = $this->db->insert('comments', $data);

			if($query) {
				return TRUE;
			}
			else{ 
				return FALSE;
			}
	}
	
	public function getComments($streamId){
	
	$this->db->select("comments.*,user_info.id as userId,user_info.fullName")
					->from('comments')
					->join('user_info','user_info.id=comments.userId','inner');
		$this->db->where('streamId',$streamId);	
		$result=$this->db->get();
		return $result->result();
		
	}
}
?>