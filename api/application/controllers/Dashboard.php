<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	class Dashboard extends CI_Controller 
	{

		function __construct() 
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('admin_model');
			$this->check_login();	
		}
		
		public function check_login()
		{
			
			if($this->session->userdata("admin_id")!="")
		      {
				return true;
			}
			else
			{
				redirect ('login');
			}
		}
		
		
		public function index()
		{
	        
			
			$this->load->view('index');
		}
		public function coupon()
		{
			
			$this->check_login();
			$this->db->select('*');
			$this->db->from('coupon');
			$data['coupon']=$this->db->get()->result();
			$this->load->view('coupon',$data);
		}
		public function searchrecord()
		{
			$data['edate']=$this->input->post('edate');
			$data['sdate']=$this->input->post('sdate');
			$data['selected']=$this->input->post('coupon');
			
			$this->check_login();
			$edate=$this->input->post('edate');
			$sdate=$this->input->post('sdate');
			$this->db->select('*');
			$this->db->from('coupon');
			$data['coupons']=$this->db->get()->result();
			
			$this->db->select('*');
			$this->db->from('coupon');
			if(!empty($edate) AND !empty($sdate)){
				$this->db->group_start();
				$this->db->where("user_history.datetime BETWEEN '$sdate' AND '$edate'");
				$this->db->group_end();
			}
			if(!empty($this->input->post('coupon'))){
				$this->db->group_start();
				$this->db->where('coupon.coupon_id',$this->input->post('coupon'));
				$this->db->group_end();
			}
			
			$this->db->join('user_history', 'user_history.c_id = coupon.coupon_id');
			$this->db->join('user', 'user.user_id = user_history.u_id');
			$this->db->group_by(array("user_history.c_id", "user_history.u_id"));
			$data['coupon']=$this->db->get()->result();
			$query=$data['coupon'];
			$index = 0;
			   foreach($query as $item)
			   {
				   
				$query[$index]->getmin = $this->getmin($item->user_id,$item->c_id);
				
				$index++;
			}
			// echo"<pre>";
			// print_r($this->db->last_query());
			// exit;
			$val=0;
           if($data['coupon']){
			  foreach($data['coupon'] as $key){
				  $val+=$key->minutes;
			  } 
			   
		   }	
$data['min']=$val;
   
			
			
			$this->load->view('coupon_time_user',$data);
		}
		
		public function searchrecords()
		{
			$data['edate']=$this->input->post('edate');
			$data['sdate']=$this->input->post('sdate');
			
			$this->check_login();
			$edate=$this->input->post('edate');
			$sdate=$this->input->post('sdate');
			$type=$this->input->post('type');
			$this->db->select('*');
			$this->db->from('user');
			if(!empty($edate) AND !empty($sdate)){
				$this->db->group_start();
				$this->db->where("user_history.datetime BETWEEN '$sdate' AND '$edate'");
				$this->db->group_end();
			}
			
			$this->db->group_start();
			$this->db->where('user_history.c_id',0);
			$this->db->group_end();
			$this->db->group_start();
			$this->db->where('user.usertype',$type);
			$this->db->group_end();
			$this->db->join('user_history', 'user_history.u_id = user.user_id');
			$this->db->group_by("user_history.u_id");
			$data['coupon']=$this->db->get()->result();
			// echo"<pre>";
			// print_r($this->db->last_query());
			// exit;
			$query=$data['coupon'];
			$index = 0;
			   foreach($query as $item)
			   {
				   
				$query[$index]->getmin = $this->getmins($item->user_id);
				
				$index++;
			}
			
			$val=0;
           if($data['coupon']){
			  foreach($data['coupon'] as $key){
				  $val+=$key->minutes;
			  } 
			   
		   }	
$data['min']=$val;
   
			
			
			$this->load->view('other_time_user',$data);
		}
		public function getmin($u_id,$c_id){
			$this->db->select_sum('minutes');
			$this->db->where('u_id',$u_id);
			$this->db->where('c_id',$c_id);
            $minutes = $this->db->get('user_history')->row();  
			if($minutes->minutes > 0){
				return $minutes->minutes;
			}else{
				return "0";
			}
			
		}
		public function getmins($u_id){
			$this->db->select_sum('minutes');
			$this->db->where('u_id',$u_id);
			 $minutes = $this->db->get('user_history')->row();  
			if($minutes->minutes > 0){
				return $minutes->minutes;
			}else{
				return "0";
			}
			
		}
		
		public function coupon_time_user()
		{
			
			$this->check_login();
			$this->check_login();
			$this->db->select('*');
			$this->db->from('coupon');
			$data['coupons']=$this->db->get()->result();
			
			$this->db->select('*');
			$this->db->from('coupon');
			$this->db->join('user_history', 'user_history.c_id = coupon.coupon_id');
			$this->db->join('user', 'user.user_id = user_history.u_id');
			$this->db->group_by(array("user_history.c_id", "user_history.u_id"));
			$data['coupon']=$this->db->get()->result();
			
			$query=$data['coupon'];
			$index = 0;
			   foreach($query as $item)
			   {
				   
				$query[$index]->getmin = $this->getmin($item->user_id,$item->c_id);
				
				$index++;
			}
			
			$val=0;
           if($data['coupon']){
			  foreach($data['coupon'] as $key){
				  $val+=$key->minutes;
			  } 
			   
		   }	
$data['min']=$val;
// echo"<pre>";
// print_r($data);
// exit;	   
			
			
			$this->load->view('coupon_time_user',$data);
		}
		
		
		public function other_time_user($type=NULL)
		{
			
			$this->check_login();
			if(empty($type)){
				redirect ('dashboard');
			}
			
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user_history.c_id',0);
			$this->db->where('user.usertype',$type);
			$this->db->join('user_history', 'user_history.u_id = user.user_id');
			$this->db->group_by("user_history.u_id");
			$data['coupon']=$this->db->get()->result();
			$data['type']=$type;
			$query=$data['coupon'];
			$index = 0;
			   foreach($query as $item)
			   {
				   
				$query[$index]->getmin = $this->getmins($item->user_id);
				
				$index++;
			}
			
			$val=0;
           if($data['coupon']){
			  foreach($data['coupon'] as $key){
				  $val+=$key->minutes;
			  } 
			   
		   }	
$data['min']=$val;
// echo"<pre>";
// print_r($data);
// exit;	   
			
			
			$this->load->view('other_time_user',$data);
		}
		public function add_coupon()
		{
			
			$this->check_login();
			$this->load->view('add_coupon');
		}
		public function add_live_video()
		{
			
			$this->check_login();
			$this->load->view('add_live_video');
		}
		
		
		public function add_live_video_save(){
			$recurring=$this->input->post('recurring');
			if($recurring=='on'){
				 $this->form_validation->set_rules('video_date_end', 'Event End date', 'required');
			}
		  $this->form_validation->set_rules('name', 'Name', 'required');
		  $this->form_validation->set_rules('video_date', 'Event Start Date', 'required|is_unique[live_video.video_date]');
		  $this->form_validation->set_rules('link', 'link', 'required');
			    $name=$this->input->post('name');
				$date=$this->input->post('video_date');
				$date=str_replace("T"," ",$date);
				$link = $this->input->post('link');
				$video_date_end=$this->input->post('video_date_end');
				$video_date_end=str_replace("T"," ",$video_date_end);
               
			if ($this->form_validation->run() === TRUE)
			{
				
			    
				if($recurring=='on'){
								   
									$startDateTime = $date;
									$repeatEndDate = $video_date_end;
									$step  = 1;
									$unit  = 'W';
									$repeatStart = new DateTime($startDateTime);
									$repeatEnd   = new DateTime($repeatEndDate);
									$interval = new DateInterval("P{$step}{$unit}");
									$period   = new DatePeriod($repeatStart, $interval, $repeatEnd);
									foreach ($period as $key => $dates ) {
										
										
												$array = array(
													'name'=>$name,
													'video_date'=>$dates->format('Y-m-d H:i:s'),
													'link'=>$link,
													'video_date_end'=>$video_date_end,
													'recurring'=>$recurring,
												);
												$res = $this->db->insert('live_video',$array); 
									}
									
				}else{
									$array = array(
									'name'=>$name,
									'video_date'=>$date,
									'link'=>$link,
									'timezone'=>$this->input->post('timezone'),
									);
									$res = $this->db->insert('live_video',$array); 
				}
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Added Successfully');
					redirect('dashboard/video_list');
				}
				else
				{
					$this->session->set_flashdata('error',"Added Failed! Something went wrong.");
					redirect('dashboard/add_live_video');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/add_live_video');
			}
		}
		
			public function video_list()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('live_video');
			$this->db->order_by('id',"desc");
			$data['live_video']=$this->db->get()->result();
			$this->load->view('live_video_list',$data);
		}
		
		public function delete_live_video($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('id', $id);
				$abc=$this->db->delete('live_video'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/video_list');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/video_list');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/video_list');
				}
				
		}
		
		
		public function send(){
			$email=$this->input->post('email');
		    $title=$this->input->post('title');
		    $body=$this->input->post('body');
			$config = Array(
											'protocol' => 'sendmail',
											'mailtype' => 'html', 
											'charset' => 'utf-8',
											'wordwrap' => TRUE
										);
										$this->load->library('email',$config);
										$this->email->from('mike@positiveedge.ca'); 
										$this->email->to($email); 
										$this->email->subject($title);
										$message = $body;
										$this->email->message($message); 				 
										if($this->email->send()){
											$this->session->set_flashdata('success', 'Email Send Successfully');
											redirect(base_url().'dashboard/all_users');			
										}else{
											$this->session->set_flashdata('error', 'Sending email failed. Please contact us');
											redirect(base_url().'dashboard/all_users');			

										}
		}
        public function all_users()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where("usertype !=",1);
			$this->db->where("user_id !=",$this->session->userdata("admin_id")); 
			$data['user']=$this->db->get()->result();
			// echo"<pre>";
			// print_r($data['user']);
			// exit;
			$this->load->view('all_users',$data);
		}
		public function rides()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('vehicals');
			$data['user']=$this->db->get()->result();
			$this->load->view('rides',$data);
		}
		public function contact()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('contact');
			$data['user']=$this->db->get()->result();
			$this->load->view('contact',$data);
		}
		public function users()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('api_users');
			$this->db->where("user_id !=",$this->session->userdata("admin_id")); 
			$data['user']=$this->db->get()->result();
			$this->load->view('user',$data);
		}
		public function coupon_user($id=Null)
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('coupon_id !=', 0);
			if($id){
			$this->db->where('coupon_id', $id);
			}
			$this->db->where("user_id !=",$this->session->userdata("admin_id")); 
			$data['user']=$this->db->get()->result();
			$this->load->view('coupon_user',$data);
		}
		public function free_user()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('usertype',3);
			//$this->db->where('coupon_id', 0);
			$data['user']=$this->db->get()->result();
			$this->load->view('free_user',$data);
		}
		public function videos()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('videos');
			$this->db->order_by('video_created_time','desc');
		    $data['videos']=$this->db->get()->result();
			$this->load->view('videos',$data);
		}
		public function read($id)
		{
			$this->check_login();
			if($id){
			
			$data=array(
							'read_marked'=>1,
							);
							
				$this->db->where('user_id',$id); 
				$result=$this->db->update('user',$data); 
					if($result){
								  $this->session->set_flashdata('success', 'Read Successfully');
								  redirect('dashboard');
					}else{
									$this->session->set_flashdata('error', 'Failed to Read');
									redirect('dashboard');
					}
			
			}else{
				$this->session->set_flashdata('error', 'Failed to Read');
				redirect('dashboard');
			}
				
		}
		public function status($status,$id)
		{
			$this->check_login();
			if($id){
			
			$data=array(
							'status'=>$status,
							);
							
				$this->db->where('user_id',$id); 
				$result=$this->db->update('api_users',$data); 
					if($result){
								  $this->session->set_flashdata('success', 'Update Successfully');
								  redirect('dashboard/users');
					}else{
									$this->session->set_flashdata('error', 'Failed to Update');
									redirect('dashboard/users');
					}
			
			}else{
				$this->session->set_flashdata('error', 'Failed to Update');
				redirect('dashboard/users');
			}
				
		}
		public function allstatus($status,$id)
		{
			$this->check_login();
			if($id){
			
			$data=array(
							'status'=>$status,
							);
							
				$this->db->where('user_id',$id); 
				$result=$this->db->update('user',$data); 
					if($result){
								  $this->session->set_flashdata('success', 'Update Successfully');
								  redirect('dashboard/all_users');
					}else{
									$this->session->set_flashdata('error', 'Failed to Update');
									redirect('dashboard/all_users');
					}
			
			}else{
				$this->session->set_flashdata('error', 'Failed to Update');
				redirect('dashboard/all_users');
			}
				
		}
		public function paid()
		{ 
		   $this->check_login();
		   $status=$this->input->post('type');
		   $id=$this->input->post('video_id');
			if($id){
			
			$data=array(
							'paid'=>$status,
							);
							
				$this->db->where('video_id',$id); 
				$result=$this->db->update('videos',$data); 
					if($result){
								  $this->session->set_flashdata('success', 'Update Successfully');
								  redirect('dashboard/videos');
					}else{
									$this->session->set_flashdata('error', 'Failed to Update');
									redirect('dashboard/videos');
					}
			
			}else{
				$this->session->set_flashdata('error', 'Failed to Update');
				redirect('dashboard/videos');
			}
		}
		public function videostatus($status,$id)
		{ 
		   $this->check_login();
			if($id){
			
			$data=array(
							'status'=>$status,
							);
							
				$this->db->where('video_id',$id); 
				$result=$this->db->update('videos',$data); 
				// echo"<pre>";
				// print_r($this->db->last_query());
				// exit;
					if($result){
								  $this->session->set_flashdata('success', 'Update Successfully');
								  redirect('dashboard/videos');
					}else{
									$this->session->set_flashdata('error', 'Failed to Update');
									redirect('dashboard/videos');
					}
			
			}else{
				$this->session->set_flashdata('error', 'Failed to Update');
				redirect('dashboard/videos');
			}
		}
		public function delete_coupon($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('coupon_id', $id);
				$abc=$this->db->delete('coupon'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/coupon');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/coupon');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/coupon');
				}
				
				
			
			
		}
		public function delete_user($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('user_id', $id);
				$abc=$this->db->delete('api_users'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/users');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/users');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/users');
				}
				
				
			
			
		}
		public function delete_ride($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('vehical_id', $id);
				$abc=$this->db->delete('vehicals'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/rides');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/rides');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/rides');
				}
				
				
			
			
		}
		public function delete_contact($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('id', $id);
				$abc=$this->db->delete('contact'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/contact');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/contact');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/contact');
				}
				
				
			
			
		}
		public function delete_freeuser($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('user_id', $id);
				$abc=$this->db->delete('user'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/coupon');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/coupon');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/coupon');
				}
				
				
			
			
		}
		public function delete_coupon_freeuser($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('user_id', $id);
				$abc=$this->db->delete('user'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/free_user');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/free_user');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/free_user');
				}
				
				
			
			
		}
		public function delete_video($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('video_id', $id);
				$abc=$this->db->delete('videos'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/videos');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										redirect('dashboard/videos');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/videos');
				}
				
				
			
			
		}
		public function extend_ride()
		{  
		  $this->form_validation->set_rules('ride', 'Extend Ride', 'required');
		  $this->form_validation->set_rules('user_id', 'User Id', 'required');
			    $ride=$this->input->post('ride');
				$user_id=$this->input->post('user_id');
				
                 
				$array = array(
				'ride_count'=>$ride
				);
			if ($this->form_validation->run() === TRUE)
			{
				
			    $this->db->where('user_id',$user_id); 
				$res = $this->db->update('user',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Extend Rides Updated Successfully');
					redirect('dashboard/users');
				}
				else
				{
					$this->session->set_flashdata('error',"Extend Rides Failed! Something went wrong.");
					redirect('dashboard/users');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/users');
			}
		}
		public function extend_date()
		{  
		  $this->form_validation->set_rules('date', 'Extend Date', 'required');
		  $this->form_validation->set_rules('user_id', 'User Id', 'required');
			    $date=$this->input->post('date');
				$user_id=$this->input->post('user_id');
				$current_package=$this->input->post('current_package');
				$date = date('Y-m-d H:i:s',strtotime($date));
                 if($current_package==0){
					$current_package=3;
					
				 }else{
					$current_package=$current_package;
				 }
				$array = array(
				'valid_date'=>$date,
				'current_package'=>$current_package
				);
				
			if ($this->form_validation->run() === TRUE)
			{
				
			    $this->db->where('user_id',$user_id); 
				$res = $this->db->update('user',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Extend Date Updated Successfully');
					redirect('dashboard/users');
				}
				else
				{
					$this->session->set_flashdata('error',"Extend Date Failed! Something went wrong.");
					redirect('dashboard/users');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/users');
			}
		}
		public function extend_dates()
		{  
		  $this->form_validation->set_rules('date', 'Extend Date', 'required');
		  $this->form_validation->set_rules('user_id', 'User Id', 'required');
			    $date=$this->input->post('date');
				$user_id=$this->input->post('user_id');
				$date = date('Y-m-d H:i:s',strtotime($date));
                 
				$array = array(
				'valid_date'=>$date,
				'current_package'=>3
				);
			if ($this->form_validation->run() === TRUE)
			{
				
			    $this->db->where('user_id',$user_id); 
				$res = $this->db->update('user',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Extend Date Updated Successfully');
					redirect('dashboard/free_user');
				}
				else
				{
					$this->session->set_flashdata('error',"Extend Date Failed! Something went wrong.");
					redirect('dashboard/free_user');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/free_user');
			}
		}
		public function add_discount()
		{  
		  $this->form_validation->set_rules('discount', 'Discount', 'required');
		  $this->form_validation->set_rules('user_id', 'User Id', 'required');
			    $discount=$this->input->post('discount');
				$user_id=$this->input->post('user_id');
				$array = array(
				'discount'=>$discount
				);
			if ($this->form_validation->run() === TRUE)
			{
				if($discount >100){
					$this->session->set_flashdata('error',"Discount can not be greater then 100");
					redirect('dashboard/users');
				}
			    $this->db->where('user_id',$user_id); 
				$res = $this->db->update('user',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Discount added Successfully');
					redirect('dashboard/users');
				}
				else
				{
					$this->session->set_flashdata('error',"Discount added Failed! Something went wrong.");
					redirect('dashboard/users');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/users');
			}
		}
		public function get_videos()
	    { 
	        $clientId = "38ff83c8bf021d12f23cbfb6bde1dfd18ea7e0f0";
			$clientSecret ="W9iqpGQ7gxZuC1yjl6uifD0r1yPRQbG2fddAlXV+Ha+Rq11OkZ7I53BUfotJoyDk3EFhuaOD6HUd9wFqQuGZMX20cCbRxNA5HrLPLdmy1ogq7u/eq7Y4DZJ3QBLDd8K2";
            $scope = "public";
            $userId = "user80347375";
            $lib = new \Vimeo\Vimeo($clientId, $clientSecret);
            $token = $lib->clientCredentials($scope);
            $token=$lib->setToken($token['body']['access_token']);
			$videos = $lib->request("/users/$userId/videos", ['per_page' => 100]);
			foreach($videos['body']['data'] as $video) {
				
				  $video_key=str_replace("/videos/","",$video['uri']);
				    $this->db->select('*');
					$this->db->from('videos');
					$this->db->where('video_key',$video_key);
					$exist=$this->db->get()->result();

				  if(empty($exist)){
				  
				  $data=array(
							'video_key'=>@$video_key,
							'video_name'=>@$video['name'],
							'video_description'=>@$video['description'],
							'video_duration'=>@$video['duration'],
							'video_pictures'=>@$video['pictures']['sizes'][4]['link'],
							'video_link'=>@$video['link'],
							'video_likes'=>@$video['metadata']['connections']['likes']['total'],
							'status'=>1,
							'video_created_time'=>@$video['created_time']
							);
							
				
				$result=$this->db->insert('videos',$data); 
				
				 
				
				  }else{
					  $data=array(
							
							'video_name'=>@$video['name'],
							'video_description'=>@$video['description'],
							);
							
                $this->db->where('video_key',$exist[0]->video_key); 
				$result=$this->db->update('videos',$data); 
				  }
			}
			 $this->session->set_flashdata('success', 'Videos List Updated Successfully');
			 redirect('dashboard/videos');
			
			
	    }
		public function upload(){
			 
			$this->load->view('upload');
		}
		public function upload_video(){
			   $title=$this->input->post('title');
			   if($this->session->userdata('title')==""){
			   if ($title==''){
							
						$this->session->set_flashdata('error', 'Title Required');
				         redirect('dashboard/upload');	
		        }
		        if ($_FILES["userfile"]==''){
							
						$this->session->set_flashdata('error', 'File Required');
				         redirect('dashboard/upload');	
		        }else{
                    	$temp = explode(".", $_FILES["userfile"]["name"]);
						$extension = end($temp);
						$filename = basename($_FILES["userfile"]["name"]);
						$filename = time().".".$extension; // Original Image
				
					$configVideo['upload_path'] = "./assets/upload/"; # check path is correct
					$configVideo['max_size'] = '1024000000000000';
					$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
					$configVideo['overwrite'] = FALSE;
					$configVideo['remove_spaces'] = TRUE;
					$configVideo['file_name'] = $filename;

					$this->load->library('upload', $configVideo);
					$this->upload->initialize($configVideo);
					


					if (!$this->upload->do_upload('userfile')) # form input field attribute
					{
						# Upload Failed
						$this->session->set_flashdata('error', $this->upload->display_errors());
						 redirect('dashboard/upload');	
					}
					else
					{
						$filename=base_url()."assets/upload/".$filename;
						$this->session->set_userdata('title', $title);
						$this->session->set_userdata('filename', $filename);
					}
			
			

		        }
				       
			   }
			    $client_id = "38ff83c8bf021d12f23cbfb6bde1dfd18ea7e0f0";
				$client_secret = "W9iqpGQ7gxZuC1yjl6uifD0r1yPRQbG2fddAlXV+Ha+Rq11OkZ7I53BUfotJoyDk3EFhuaOD6HUd9wFqQuGZMX20cCbRxNA5HrLPLdmy1ogq7u/eq7Y4DZJ3QBLDd8K2";
				$scopes = "upload";
				$userId = "user80347375";
				$lib = new \Vimeo\Vimeo($client_id, $client_secret);
				$redirect_uri=base_url().'dashboard/upload_video';
				if($this->input->get("code")==""){
				$state=rand(0,9999);
				$this->session->set_userdata('vimeo_state', $state);
				$url = $lib->buildAuthorizationEndpoint($redirect_uri, $scopes, $state);
				header ('Location: '.$url.'');
				}else{
				$state=$this->session->userdata('vimeo_state');
				$code=$this->input->get("code");
				$token = $lib->accessToken($code,$redirect_uri);
				
                $video=$lib->setToken($token['body']['access_token']);
				$url=$this->session->userdata('filename');
                $video_response = $lib->request('/me/videos',['name' => $this->session->userdata('title'),'upload' => ['approach' => 'pull','link' => $url]],'POST');
				$this->session->unset_userdata('title');
				$this->session->unset_userdata('filename');
				if($video_response){
					 $this->session->set_flashdata('success', 'Videos Uploaded Successfully');
					redirect('dashboard/upload');	
				}else{
					$this->session->set_flashdata('error', 'Failed to upload');
					redirect('dashboard/upload');	
					
				}
				
				
				}
				
			 
		}
		public function state(){
			
			
				
				// if ($_FILES["file"]==''){
						// $this->session->set_flashdata('error', 'Please Select Video to Upload');
				        // redirect('dashboard/upload');
							
		        // }else{

				// $temp = explode(".", $_FILES["file"]["name"]);
				// $extension = end($temp);
				// $path="./assets/upload/";

				 // $filename = basename($_FILES["file"]["name"]);
				 // $filename = time().".".$extension; // Original Image
				 // if(move_uploaded_file($_FILES["file"]["tmp_name"],$path . $filename))
						// {
							
							// $filename= base_url()."assets/upload/".$filename;
							

						// }else{
				            // $this->session->set_flashdata('error', 'Failed to upload');
				            // redirect('dashboard/upload');
				 // }
			
			
			

		        // }
	
			
			$title=$this->input->post('title');
			
			$client_id = "38ff83c8bf021d12f23cbfb6bde1dfd18ea7e0f0";
			$client_secret = "W9iqpGQ7gxZuC1yjl6uifD0r1yPRQbG2fddAlXV+Ha+Rq11OkZ7I53BUfotJoyDk3EFhuaOD6HUd9wFqQuGZMX20cCbRxNA5HrLPLdmy1ogq7u/eq7Y4DZJ3QBLDd8K2";
			$scopes = "private";
			$userId = "user80347375";
			$lib = new \Vimeo\Vimeo($client_id, $client_secret);
			$redirect_uri="http://dev.positiveedge.ca/admin/dashboard/upload_video";
			$state=rand(0,9999);
			$_SESSION['vimeo_state']=$state;
			$url = $lib->buildAuthorizationEndpoint($redirect_uri, $scopes, $state);
			header ('Location: '.$url.'');

			
		}
		
	
		public function template()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('tempates');
			$data['tempates']=$this->db->get()->result();
			$this->load->view('templates',$data);
		}
		public function addtemplate()
		{
			$this->check_login();
			
			$this->load->view('addtemplate');
		}
		public function add_coupon_save(){
			$type=$this->input->post('type');
		  $this->form_validation->set_rules('title', 'Coupon Name', 'required');
		  if($type=='month'){
			   $this->form_validation->set_rules('month', 'Coupon Month', 'required');
		  }else{
			   $this->form_validation->set_rules('date', 'Coupon Date', 'required');
		  }
		 
		        $title=$this->input->post('title');
				  if($type=='month'){
				$array = array(
				'coupon_name'=>$title,
				'coupon_month'=>$this->input->post('month'),
				'coupon_type'=>$this->input->post('type'),
				);
				  }else{
					$array = array(
				'coupon_name'=>$title,
				'coupon_date'=>$this->input->post('date'),
				'coupon_type'=>$this->input->post('type'),
				);  
				  }
			if ($this->form_validation->run() === TRUE)
			{
				
			    
				$res = $this->db->insert('coupon',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Coupon Added Successfully');
					redirect('dashboard/add_coupon');
				}
				else
				{
					$this->session->set_flashdata('error',"Coupon Added Failed! Something went wrong.");
					redirect('dashboard/add_coupon');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/add_coupon');
			}	
		}
		public function addtemplate_save()
		{  
		  $this->form_validation->set_rules('title', 'Template Title', 'required');
		  $this->form_validation->set_rules('body', 'Template Body', 'required');
		  $this->form_validation->set_rules('type', 'Template Type', 'required');
			    $title=$this->input->post('title');
				$body=$this->input->post('body');
				$type = $this->input->post('type');
                 
				$array = array(
				'title'=>$title,
				'body'=>$body,
				'type'=>$type,
				);
			if ($this->form_validation->run() === TRUE)
			{
				
			    
				$res = $this->db->insert('tempates',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Template Added Successfully');
					redirect('dashboard/addtemplate');
				}
				else
				{
					$this->session->set_flashdata('error',"Template Added Failed! Something went wrong.");
					redirect('dashboard/addtemplate');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/addtemplate');
			}
		}
		
		
		public function delete_tempates($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('t_id', $id);
				$abc=$this->db->delete('tempates'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/template');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/template');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/template');
				}
				
				
			
			
		}
		
		
		
		public function edit_tempates($id)
		{
			$this->check_login();
			
			if($id){
				$this->db->select('*');
				$this->db->where('t_id', $id);
				$this->db->from('tempates');
				$data['tempates']=$this->db->get()->result();
				$this->load->view('edit_tempates',$data);
			}else{
				$this->session->set_flashdata('error', 'Failed to Delete');
			redirect('dashboard/template');
			}
			
			
		}
		
		public function edittemplate_save()
		{  
		  $this->form_validation->set_rules('title', 'Template Title', 'required');
		  $this->form_validation->set_rules('body', 'Template Body', 'required');
		  $this->form_validation->set_rules('type', 'Template Type', 'required');
			    $title=$this->input->post('title');
				$body=$this->input->post('body');
				$type = $this->input->post('type');
				$id = $this->input->post('id');
                 
				$array = array(
				'title'=>$title,
				'body'=>$body,
				'type'=>$type,
				);
			if ($this->form_validation->run() === TRUE)
			{
				
			    $this->db->where('t_id', $id);
				$res = $this->db->update('tempates',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Template Edit Successfully');
					redirect('dashboard/template');
				}
				else
				{
					$this->session->set_flashdata('error',"Template Edit Failed! Something went wrong.");
					redirect('dashboard/edit_tempates/'.$id);
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/edit_tempates/'.$id);
			}
		}
		public function email()
		{
			$this->check_login();
			
			$this->load->view('sendemail');
		}
		public function send_email(){   
						 $this->form_validation->set_rules('title', 'Template Title', 'required');
		                 $this->form_validation->set_rules('body', 'Template Body', 'required');
						 
						if ($this->form_validation->run() === TRUE)
							{
								$title=$this->input->post('title');
								$body=$this->input->post('body');
								$type=$this->input->post('type');
								if($type==1){
								$this->db->select('*');
								$this->db->from('user');
								$user=$this->db->get()->result();
								}else{
								$this->db->select('*');
								$this->db->from('free_class');
								$user=$this->db->get()->result();
								}
								
		                        $config = Array(
								  'protocol' => 'sendmail',
								  'mailtype' => 'html', 
								  'charset' => 'utf-8',
								  'wordwrap' => TRUE
                                 );
		                        $this->load->library('email',$config);
								
								foreach($user as $user){
								$this->email->from('mike@positiveedge.ca'); 
								$this->email->to($user->email); 
								$this->email->subject($title);
								$data['message_body']=$body;
								$message = $this->load->view('template',$data,TRUE);
								$this->email->message($message); 				 
								$this->email->send();
								
								}
								$this->session->set_flashdata('success', 'Email Send to All users');
					           redirect('dashboard/email/');
							}else{
									$this->session->set_flashdata('error', validation_errors());
									redirect('dashboard/email/');
								}
						        
		}
		public function getuserhistory(){
			$id=$this->input->post('user_id');
			$coupon=$this->input->post('coupon');
			$this->db->select('*');
			$this->db->from('coupon');
			$this->db->where('user_history.u_id',$id);
			$this->db->where('user_history.c_id',$coupon);
			$this->db->join('user_history', 'user_history.c_id = coupon.coupon_id');
			$this->db->join('user', 'user.user_id = user_history.u_id');
			//$this->db->group_by(array("user_history.c_id", "user_history.u_id"));
			$data=$this->db->get()->result();
			if(!empty($data)){
				$msg = array('Success'=>'200','message' => 'User History','record'=>$data);
				echo json_encode($msg);
				exit();
			}else{
				$msg = array('Success'=>'400','message' => 'User History not found.' );
				echo json_encode($msg);
				exit();
			}
			
		}
		public function getusershistory(){
			$id=$this->input->post('user_id');
			
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user_history.c_id',0);
			$this->db->where('user_history.u_id',$id);
			$this->db->join('user_history', 'user_history.u_id = user.user_id');
			
			$data=$this->db->get()->result();
			if(!empty($data)){
				$msg = array('Success'=>'200','message' => 'User History','record'=>$data);
				echo json_encode($msg);
				exit();
			}else{
				$msg = array('Success'=>'400','message' => 'User History not found.' );
				echo json_encode($msg);
				exit();
			}
			
		}
		public function paidUsers()
		{
			
			



			$this->db->select('c.*,m.*');
			$this->db->from('user as c');
			
			$this->db->join('transaction as m', 'c.user_id = m.user_id', 'left'); 
			$this->db->join('transaction as m1', 'm.user_id = m1.user_id AND m.t_id < m1.t_id', 'left'); 
			$this->db->where('m1.t_id IS NULL', null, false);
			$this->db->where('c.usertype',2);
			// $this->db->where('c.valid_date !=',"");
			// $this->db->where('c.valid_date >',date('Y-m-d H:i:s'));
			// $this->db->where('c.current_package !=',0);
			$this->db->where('m.txn_id !=','6WJ08336CT808862A');
			$data['user']=$this->db->get()->result();

			
			$this->load->view('paid',$data);
		}
		public function searchpaidUsers()
		{
			
			$data['edate']=$this->input->post('edate');
			$data['sdate']=$this->input->post('sdate');
			$data['selected']=$this->input->post('coupon');
			$edate=$this->input->post('edate');
			$sdate=$this->input->post('sdate');
			$this->db->select('c.*,m.*');
			$this->db->from('user as c');
			$this->db->join('transaction as m', 'c.user_id = m.user_id', 'left'); 
			$this->db->join('transaction as m1', 'm.user_id = m1.user_id AND m.t_id < m1.t_id', 'left'); 
			$this->db->where('m1.t_id IS NULL', null, false);
			$this->db->where('c.usertype',2);
			$this->db->where('m.txn_id !=','6WJ08336CT808862A');
			
			
			
			if(!empty($edate) AND !empty($sdate)){
				
				$e=date('Y-m-d H:i:s', strtotime($edate));
				$s=date('Y-m-d H:i:s', strtotime($sdate));
				$this->db->group_start();
				$this->db->where("c.valid_date BETWEEN '$s' AND '$e'");
				$this->db->group_end();
				
			}
			if(!empty($this->input->post('coupon'))){
				
				
				if($this->input->post('coupon')==2){
					$this->db->group_start();
					$this->db->where("c.valid_date <",date('Y-m-d H:i:s'));
					$this->db->group_end();
				}else{
					$this->db->group_start();
					$this->db->where('c.valid_date !=',"");
					$this->db->where('c.valid_date >',date('Y-m-d H:i:s'));
					$this->db->where('c.current_package !=',0);
					$this->db->group_end();
					
				}
				
               				
			}
			
			
			$data['user'] = $this->db->get()->result(); 
// echo"<pre>";
// print_r($this->db->last_query());
// exit;
			$this->load->view('paid',$data);
		}
		public function lastgetTransaction($user_id){
			$this->db->select('*');
			$this->db->from('transaction');
			$this->db->where('user_id',$user_id);
			$this->db->where('txn_id !=','6WJ08336CT808862A');
			$record=$this->db->order_by('t_id',"desc")->limit(1)->get()->result();
			if(!empty($record)){
				return $record[0]->txn_id;
			}
			
		}
		public function freeUsers()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('usertype',3);
			$this->db->group_start();
			$this->db->where('valid_date',"");
			$this->db->or_where('valid_date <',date('Y-m-d H:i:s'));
			$this->db->group_end();
		    $data['user']=$this->db->get()->result();
			$this->load->view('free',$data);
		}
		public function searchfreeUsers()
		{
			$data['edate']=$this->input->post('edate');
			$data['sdate']=$this->input->post('sdate');
			$edate=$this->input->post('edate');
			$sdate=$this->input->post('sdate');
			$this->check_login();
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('usertype',3);
			$this->db->group_start();
			$this->db->where('valid_date',"");
			$this->db->or_where('valid_date <',date('Y-m-d H:i:s'));
			$this->db->group_end();
			if(!empty($edate) AND !empty($sdate)){
				$e=date('Y-m-d H:i:s', strtotime($edate));
				$s=date('Y-m-d H:i:s', strtotime($sdate));
				$this->db->group_start();
				$this->db->where("user_created_date BETWEEN '$s' AND '$e'");
				$this->db->group_end();
			}
		    $data['user']=$this->db->get()->result();
			$this->load->view('free',$data);
		}
		public function converterUsers()
		{
			$this->check_login();
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('converterUsers',1);
			$data['user']=$this->db->get()->result();
			$this->load->view('converterUsers',$data);
		}
		public function searchconverterUsers()
		{
			$this->check_login();
			$data['edate']=$this->input->post('edate');
			$data['sdate']=$this->input->post('sdate');
			$edate=$this->input->post('edate');
			$sdate=$this->input->post('sdate');
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('converterUsers',1);
			if(!empty($edate) AND !empty($sdate)){
				$e=date('Y-m-d H:i:s', strtotime($edate));
				$s=date('Y-m-d H:i:s', strtotime($sdate));
				$this->db->group_start();
				$this->db->where("converterDate BETWEEN '$s' AND '$e'");
				$this->db->group_end();
			}
			$data['user']=$this->db->get()->result();
			
			$this->load->view('converterUsers',$data);
			
		}
		public function special_discount(){
			// $this->db->select('*');
			// $this->db->from('special_discount');
			// $this->db->where('id',1);
			// $data['user']=$this->db->get()->result();
			$this->load->view('special_discount');
		}
		public function special_discount_list(){
			$this->db->select('*');
			$this->db->from('special_discount');
			$data['coupon']=$this->db->get()->result();
			$this->load->view('special_discount_list',$data);
		}
		public function update_special_discount(){
			$this->form_validation->set_rules('title', 'Discount code', 'required');
			 $this->form_validation->set_rules('code', 'Discount Code', 'required');
		    $this->form_validation->set_rules('percentage', 'Discount Percentage', 'required');
			    $title=$this->input->post('title');
				$code=$this->input->post('code');
				$percentage=$this->input->post('percentage');
				$array = array(
				'title'=>$title,
				'code'=>$code,
				'percentage'=>$percentage,
				);
			if ($this->form_validation->run() === TRUE)
			{
				
			    // $this->db->where('id',1); 
				$res = $this->db->insert('special_discount',$array); 
				
				if($res)
				{
					$this->session->set_flashdata('success', 'Special Discount added Successfully');
					redirect('dashboard/special_discount_list');
				}
				else
				{
					$this->session->set_flashdata('error',"Special Discount added Failed! Something went wrong.");
					redirect('dashboard/special_discount');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('dashboard/special_discount');
			}
		}
		public function delete_special_discount($id)
		{  
		$this->check_login();
		if($id){
				$this->db->where('id', $id);
				$abc=$this->db->delete('special_discount'); 
						if($abc==1){
									  $this->session->set_flashdata('success', 'Delete Successfully');
									  redirect('dashboard/special_discount_list');
						}else{
										$this->session->set_flashdata('error', 'Failed to Delete');
										 redirect('dashboard/special_discount_list');
						}
				
				}else{
					$this->session->set_flashdata('error', 'Failed to Delete');
				redirect('dashboard/special_discount_list');
				}
				
				
			
			
		}
		
		
		
	}
