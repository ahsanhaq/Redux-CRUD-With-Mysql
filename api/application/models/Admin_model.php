<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
	public function update_album($id,$array)
	{	
		$this->db->where('album_id',$id);
		$res = $this->db->update('album',$array);
		return $res;
	}
	
	public function insert_album($array)
	{	
		$res = $this->db->insert('album',$array);
		return $res;
	}
	
	public function delete_album($id,$category)
	{
		$this->db->where('album_id',$id);
		$this->db->delete('album'); 
		if ($this->db->affected_rows() == 0) 
		{
			$this->session->set_flashdata('error',"Delete Failed! Something went wrong.");
			redirect('admincontroller/category_album/'.$category);
			return FALSE;
		}
		else
		{
			$this->session->set_flashdata('success', 'Award Delete Successfully');
			redirect('admincontroller/category_album/'.$category);
			return TRUE;
		}        
	}
	
	public function get_album($id)
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('album_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function get_category_album($id)
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_fashion_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',1);
		$this->db->order_by('album_id','desc');
		$this->db->limit(6,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_fashion()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',1);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_comercial()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',2);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_comercial_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',2);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_beauty()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',3);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_beauty_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',3);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_lifestyle()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',4);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_lifestyle_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',4);
		$this->db->order_by('album_id','desc');		
		$this->db->limit(6,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_portrait()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',5);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_portrait_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',5);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_families()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',6);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_families_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',6);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_kids()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',7);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_kids_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',7);
		$this->db->order_by('album_id','desc');		
		$this->db->limit(6,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_product()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',8);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_product_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',8);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_food()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',9);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_food_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',9);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_interior()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',10);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_interior_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',10);
		$this->db->order_by('album_id','desc');		
		$this->db->limit(6,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_exterior()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',11);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_exterior_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',11);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_industrial()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',12);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_industrial_limt()
	{	
		$this->db->select('*');
		$this->db->from('album');
		$this->db->where('category',12);
		$this->db->order_by('album_id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function insert_award($array)
	{	
		$res = $this->db->insert('award',$array);
		return $res;
	}
	
	public function get_award()
	{	
		$this->db->select('*');
		$this->db->from('award');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_award_id($id)
	{	
		$this->db->select('*');
		$this->db->from('award');
		$this->db->where('award_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function update_award($id,$array)
	{	
		$this->db->select('*');
		$this->db->where('award_id',$id);
		$res = $this->db->update('award',$array);
		return $res;
	}
	
	public function delete_award($id)
	{
		$this->db->where('award_id',$id);
		$this->db->delete('award'); 
		if ($this->db->affected_rows() == 0) 
		{
			$this->session->set_flashdata('error',"Delete Failed! Something went wrong.");
			redirect('admincontroller/view_award/'.$id);
			return FALSE;
		}
		else
		{
			$this->session->set_flashdata('success', 'Award Delete Successfully');
			redirect('admincontroller/view_award');
			return TRUE;
		}        
	}
		
	public function get_profile()
	{	
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function update_profile($array)
	{	
		$this->db->select('*');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$res = $this->db->update('user',$array);
		return $res;
	}
	
	public function old_pass_check($password)
	{
		$this->db->from('user');
		$this->db->where('user_id',$this->input->post('user_id'));
		$this->db->where('email',$this->session->userdata('email'));
		$this->db->where('password',$password);
		$query = $this->db->get();
		
		if($query->num_rows() >= 0)
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
	
	public function save_password($new_password)
	{
		$data = array(
		'password' => $new_password,
		'con_password' => $new_password
		);
				
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('user', $data); 
		return "true";
	}
}