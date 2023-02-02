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
	$this->db->where('streamId',$streamId);
	$this->db->select("comments.*,user_info.id,user_info.fullName,user_info.email,user_info.accType,user_info.city,user_info.displayPicture,user_info.accType,user_info.account_id")
					->from('comments')
					->join('user_info','user_info.id=comments.userId','left');
			$result=$this->db->get();
		
			if($result->num_rows() > 0){ 
				return $result->result_array();
			}else {
				return FALSE;
			} 
	}
}
?>