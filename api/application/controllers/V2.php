<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
class v2 extends CI_Controller {
	
			function __construct()
			{
				parent::__construct();
				 $this->load->library('encryption');
				$this->load->helper('response');
				$this->load->helper('cookie');
				$this->load->model('SignupModel');
				$this->load->model('SignInModel');
				$this->load->library("pagination");
				$this->load->model('login_model');
				$this->load->library('form_validation');
			}
			public function login(){
			    $rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$email=$PostData->email;
			    $password=$PostData->password;
				
				
				            if($email==''){
										    $response["error"]=true;
											$response["message"] =  'Email required';
											EchoResponse(200, $response);
							}elseif($password==''){
											$response["error"]=true;
											$response["message"] =  'Password required';
											EchoResponse(200, $response); 
							}else{
								
											$this->db->select('*');
											$this->db->from('api_users');
											$this->db->where("email",$email);
											$this->db->where("password",md5($password));
											$this->db->where("status",1);
											$record=$this->db->get()->result(); 
												
								if($record){
												 
											
											$response["error"]=false;
							                $response["message"] = 'login_success';
											$response["data"]["user_id"]= $record[0]->user_id ;
											$response["data"]["username"]= $record[0]->username;
											$response["data"]["email"]= $record[0]->email;
											$response["data"]["phone"]= $record[0]->phone;
											$response["data"]["cnic"]= $record[0]->cnic;
											$response["data"]["pic"]= base_url()."assets/user_images/".$record[0]->pic;
											$response["data"]["type"]= $record[0]->type;
											$response["data"]["license"]= $record[0]->license;
											$response["data"]["status"]= $record[0]->status;
											$response["data"]["created_at"]= $record[0]->created_at;
											EchoResponse(200, $response);
							    }else{
											$response["error"]=true;
											$response["message"] =  'Email Or Password Incorrect';
											EchoResponse(200, $response); 		
								}	
						}
			}
			public function listrec(){
				
										    $this->db->select('*');
											$this->db->from('users');
											$rec = $this->db->get()->result(); 
                                            
				                            if (!empty($rec)) {
											  
												$response["error"]=false;
												$response['data'] = $rec;
												EchoResponse(200, $response);
											}else{
													$response["error"]=true;
													$response["message"] =  'No Record found againts this User';
													EchoResponse(200, $response);
											}
										
				
			}
			public function onerec($id=Null){
				
										    $this->db->select('*');
											$this->db->where('id',$id);
											$this->db->from('users');
											$rec = $this->db->get()->result(); 
                                            
				                            if (!empty($rec)) {
											  
												$response["error"]=false;
												$response['data'] = $rec;
												EchoResponse(200, $response);
											}else{
													$response["error"]=true;
													$response["message"] =  'No Record found againts this User';
													EchoResponse(200, $response);
											}
										
				
			}
			public function add(){
			    $rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$name=$PostData->name;
				$email=$PostData->email;
				$phone=$PostData->phone;
			    $country=$PostData->country;
				
				
				            if($name==''){
										    $response["error"]=true;
											$response["message"] =  'Name required';
											EchoResponse(200, $response);
							}elseif($email==''){
											$response["error"]=true;
											$response["message"] =  'Email required';
											EchoResponse(200, $response); 
							}elseif($phone==''){
											$response["error"]=true;
											$response["message"] =  'Phone required';
											EchoResponse(200, $response); 
							}elseif($country==''){
											$response["error"]=true;
											$response["message"] =  'Country required';
											EchoResponse(200, $response); 
							}else{
								              $data = array(
												
												'email'=>$email,
												'name'=>$name,
												'phone'=>$phone,
												'country'=>$country,
												
										);	
															
										$query=$this->db->insert('users',$data);
										$insert = $this->db->insert_id();
										if ($insert > 0) {
											    $response["error"]=false;
												$response["message"] ='User Added Successfully';
												EchoResponse(200, $response);
										}else{
												$response["error"]=true;
												$response["message"] =  'Failed to Add';
												EchoResponse(200, $response);
										}
											
						    }
			}
			public function update($id=NULL){
			    $rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$name=$PostData->name;
				$email=$PostData->email;
				$phone=$PostData->phone;
			    $country=$PostData->country;
				
				
				            if($name==''){
										    $response["error"]=true;
											$response["message"] =  'Name required';
											EchoResponse(200, $response);
							}elseif($email==''){
											$response["error"]=true;
											$response["message"] =  'Email required';
											EchoResponse(200, $response); 
							}elseif($phone==''){
											$response["error"]=true;
											$response["message"] =  'Phone required';
											EchoResponse(200, $response); 
							}elseif($country==''){
											$response["error"]=true;
											$response["message"] =  'Country required';
											EchoResponse(200, $response); 
							}else{
								              $data = array(
												
												'email'=>$email,
												'name'=>$name,
												'phone'=>$phone,
												'country'=>$country,
												
										);	
										$this->db->where('id',$id);					
										$query=$this->db->update('users',$data);
										
										if ($query) {
											    $response["error"]=false;
												$response["message"] ='User Update Successfully';
												EchoResponse(200, $response);
										}else{
												$response["error"]=true;
												$response["message"] =  'Failed to Add';
												EchoResponse(200, $response);
										}
											
						    }
			}
			public function deleteData($id=NULL){
				$this->db->where('id', $id);
                $query=$this->db->delete('users');
				                        if ($query) {
											    $response["error"]=false;
												$response["message"] ='User Update Successfully';
												EchoResponse(200, $response);
										}else{
												$response["error"]=true;
												$response["message"] =  'Failed to Add';
												EchoResponse(200, $response);
										}
			}
			
			
}
?>
