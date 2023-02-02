<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class v1 extends CI_Controller {
	
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
			public function index(){
				        $this->load->view('api');
			}
			public function checkuser($user_id){
				
				                $this->db->select('user_id');
								$this->db->where('user_id', $user_id);
								//$this->db->where('type','Driver');
								$this->db->from('api_users');
								$rec = $this->db->get()->result();
								return $rec;
			}
			public function checkrdie($id){
				                $this->db->select('type');
								$this->db->where('vehical_id', $id);
								$this->db->from('vehicals');
								$rec = $this->db->get()->result();
								if(!empty($rec)){
									if(@$rec[0]->type=='Sharing'){
										$this->db->select('*');
										$this->db->where('vehicals.type','Sharing');
										$this->db->where('vehicals.vehical_id',$id);
										$this->db->from('history');
										$this->db->join('vehicals','vehicals.vehical_id = history.vid');
									    return $recsss = $this->db->get()->num_rows();
									}else{
										return false;
									}
								}else{
									return false;
								}	
			}
			public function checkemail($email){
				
				                $this->db->select('user_id');
								$this->db->where('email', $email);
								$this->db->from('api_users');
								$rec = $this->db->get()->result();
								return $rec;
			}
			public function checkItems($itemID ){
				                $this->db->select('*');
								$this->db->where('itemID', $itemID);
								$this->db->from('items');
								$rec = $this->db->get()->result();
								return $rec;
			}
			public function addvehical(){
			    $rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$model=$_POST['model'];
			    $vairent=$_POST['vairent'];
			    $number=$_POST['number'];
				$description=$_POST['description'];
			    $pic=$_FILES["pic"]["name"];
				$price=$_POST['price'];
				$type=$_POST['type'];
				$location=$_POST['location'];
				$user_id=$_POST['user_id'];
				$rec=$this->checkuser($_POST['user_id']);
				
					        if(empty($rec)) {
											$response["error"]=true;
											$response['message'] = 'User not found';
											EchoResponse(200, $response);
							}elseif($model==''){
								
										    $response["error"]=true;
											$response["message"] =  'Model required';
											EchoResponse(200, $response);
							}elseif($vairent==''){
								
											$response["error"]=true;
											$response["message"] =  'Vairent required';
											EchoResponse(200, $response); 
							}elseif($number==''){
								
											$response["error"]=true;
											$response["message"] =  'Number required';
											EchoResponse(200, $response); 
							}elseif($description==''){
								
											$response["error"]=true;
											$response["message"] =  'Description required';
											EchoResponse(200, $response); 
							}elseif($price==''){
								
											$response["error"]=true;
											$response["message"] =  'Price required';
											EchoResponse(200, $response); 
							}elseif($type==''){
								
											$response["error"]=true;
											$response["message"] =  'Vehical Type required';
											EchoResponse(200, $response); 
							}elseif($pic==''){
								
											$response["error"]=true;
											$response["message"] =  'Vehical Pic required';
											EchoResponse(200, $response); 
							}elseif($location==''){
								
											$response["error"]=true;
											$response["message"] =  'Location required';
											EchoResponse(200, $response); 
							}else{
											$temp = explode(".", $_FILES["pic"]["name"]);
											$extension = end($temp);
											$path="./assets/vehical_images/";

											 $filename = basename($_FILES["pic"]["name"]);
											 $filename = time().".".$extension; // Original Image
											 if(move_uploaded_file($_FILES["pic"]["tmp_name"],$path . $filename)){
														
												$filename= $filename;
														

											}else{
												$response["error"]=true;
											    $response["message"] =  'Vehicals Pic Upload Failed';
											    EchoResponse(200, $response); 		
											}
												
			                                
								            $data = array(
												'model'=>$model,
												'vairent'=>$vairent,
												'number'=>$number,
												'description'=>$description,
												'price'=>$price,
												'type'=>$type,
												'user_id'=>$user_id,
												'vpic'=>$filename,
												'location'=>$location
										);	
															
										$query=$this->db->insert('vehicals',$data);
										$insert = $this->db->insert_id();
										if ($insert > 0) {
											    $response["error"]=false;
												$response["message"] ='Vehical Added Successfully';
												EchoResponse(200, $response);
										}else{
												$response["error"]=true;
												$response["message"] =  'Failed to Add';
												EchoResponse(200, $response);
										}
								
							}
				
				
				
				
				
			}
			public function signup(){
			    $username=$_POST['username'];
			    $email=$_POST['email'];
				$password=$_POST['password'];
			    $phone=$_POST['phone'];
				$cnic=$_POST['cnic'];
			    $pic=$_FILES["pic"]["name"];
				$license=$_POST['license'];
			    $type=$_POST['type'];
				$rec=$this->checkemail($email);
				
					        if(!empty($rec)) {
											$response["error"]=true;
											$response['message'] = 'Duplicate email found';
											EchoResponse(200, $response);
							}
							elseif($username==''){
								
										    $response["error"]=true;
											$response["message"] =  'UserName required';
											EchoResponse(200, $response);
							}elseif($email==''){
								
											$response["error"]=true;
											$response["message"] =  'Email required';
											EchoResponse(200, $response); 
							}elseif($password==''){
								
											$response["error"]=true;
											$response["message"] =  'Password required';
											EchoResponse(200, $response); 
							}elseif($phone==''){
								
											$response["error"]=true;
											$response["message"] =  'Phone required';
											EchoResponse(200, $response); 
							}elseif($cnic==''){
								
											$response["error"]=true;
											$response["message"] =  'Cnic required';
											EchoResponse(200, $response); 
							}elseif($type==''){
								
											$response["error"]=true;
											$response["message"] =  'User Type required';
											EchoResponse(200, $response); 
							}elseif($type=='Driver' && $license==''){
								           
											$response["error"]=true;
											$response["message"] =  'License required';
											EchoResponse(200, $response); 
										
										
							}elseif($pic==''){
								
											$response["error"]=true;
											$response["message"] =  'User Pic required';
											EchoResponse(200, $response); 
							}else{
											$temp = explode(".", $_FILES["pic"]["name"]);
											$extension = end($temp);
											$path="./assets/user_images/";

											 $filename = basename($_FILES["pic"]["name"]);
											 $filename = time().".".$extension; // Original Image
											 if(move_uploaded_file($_FILES["pic"]["tmp_name"],$path . $filename)){
														
												$filename= $filename;
														

											}else{
												$response["error"]=true;
											    $response["message"] =  'User Pic Upload Failed';
											    EchoResponse(200, $response); 		
											}
												
			
								            $data = array(
												'username'=>$username,
												'email'=>$email,
												'password'=>md5($password),
												'phone'=>$phone,
												'cnic'=>$cnic,
												'type'=>$type,
												'status'=>0,
												'pic'=>$filename,
												'license'=>$license,
												
										);	
															
										$query=$this->db->insert('api_users',$data);
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
			public function signin(){
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
			public function search(){
				$rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$location=$PostData->location;
			    $type=$PostData->type;
				
				            if($location=='') {
											$response["error"]=true;
											$response['message'] = 'Location required';
											EchoResponse(200, $response);
							}elseif($type==''){
											$response["error"]=true;
											$response["message"] =  'Vehical Type required';
											EchoResponse(200, $response); 
							}else{
											$this->db->select('*');
											$this->db->where('vehicals.type',$type);
											$this->db->where('vehicals.ride_status !=',1);
											$this->db->like('vehicals.location',$location);
											$this->db->from('vehicals');
											$this->db->join('api_users','api_users.user_id = vehicals.user_id');
											$rec = $this->db->get()->result();
											
											if (!empty($rec)) {
											  
												$response["error"]=false;
												$response['data'] = $rec;
												EchoResponse(200, $response);
											}else{
													$response["error"]=true;
													$response["message"] =  'No Ride found againts this location';
													EchoResponse(200, $response);
											}
											
											
											
							}
			}
			public function detail(){
				$rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$id=$PostData->id;
			    
				            if($id=='') {
											$response["error"]=true;
											$response['message'] = 'Vehical id required';
											EchoResponse(200, $response);
							}else{
											$this->db->select('*');
											$this->db->where('vehicals.vehical_id ',$id);
											$this->db->from('vehicals');
											$this->db->join('api_users','api_users.user_id = vehicals.user_id');
											$rec = $this->db->get()->result();
											
											if (!empty($rec)) {
											  
												$response["error"]=false;
												$response['data'] = $rec;
												EchoResponse(200, $response);
											}else{
													$response["error"]=true;
													$response["message"] =  'No Ride found againts this location';
													EchoResponse(200, $response);
											}
											
											
											
							}
			}
			public function book(){
				                    
				$rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$id=$PostData->id;
				$user_id=$PostData->user_id;
				            if($user_id==''){
								            $response["error"]=true;
											$response['message'] = 'User id required';
											EchoResponse(200, $response);
								
							}else if($id=='') {
											$response["error"]=true;
											$response['message'] = 'Vehical id required';
											EchoResponse(200, $response);
							}else{
								 $this->db->select('type');
								 $this->db->where('vehical_id', $id);
								 $this->db->from('vehicals');
								 $rec = $this->db->get()->result();
								if(@$rec[0]->type=='Sharing'){
										$ride_status=0;
										$this->db->select('*');
										$this->db->where('vehicals.vehical_id',$id);
										$this->db->from('history');
										$this->db->join('vehicals','vehicals.vehical_id = history.vid');
									    $recsss = $this->db->get()->num_rows();
										
										if($recsss >= 4){
											        $response["error"]=true;
													$response["message"] =  'No Seats Avaiable';
													EchoResponse(200, $response);
										}else{
													$data=array(
																'ride_status'=>$ride_status,
																);
																
													$this->db->where('vehical_id',$id); 
													$result=$this->db->update('vehicals',$data); 
													$data1 = array(
														'vid'=>$id,
														'uid'=>$user_id,
													);	
																	
													$query=$this->db->insert('history',$data1);
												
													if (!empty($result)) {
													  
														$response["error"]=false;
														$response['message'] = 'Book Successfully';
														EchoResponse(200, $response);
													}else{
															$response["error"]=true;
															$response["message"] =  'No Ride found againts this location';
															EchoResponse(200, $response);
													}
										}
										
								}else{
											        $ride_status=1;
											        $data=array(
																'ride_status'=>$ride_status,
																);
																
													$this->db->where('vehical_id',$id); 
													$result=$this->db->update('vehicals',$data); 
													$data1 = array(
														'vid'=>$id,
														'uid'=>$user_id,
													);	
																	
													$query=$this->db->insert('history',$data1);
												
													if (!empty($result)) {
													  
														$response["error"]=false;
														$response['message'] = 'Book Successfully';
														EchoResponse(200, $response);
													}else{
															$response["error"]=true;
															$response["message"] =  'No Ride found againts this location';
															EchoResponse(200, $response);
													}
									
								}
								
											
											
											
											
							}
			}
			public function contact(){
				$rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$name=$PostData->name;
				$email=$PostData->email;
                $phone=$PostData->phone;
                $message=$PostData->message;			    
				            if($name=='') {
											$response["error"]=true;
											$response['message'] = 'Name required';
											EchoResponse(200, $response);
							}else if($email=='') {
											$response["error"]=true;
											$response['message'] = 'Email required';
											EchoResponse(200, $response);
							}else if($phone=='') {
											$response["error"]=true;
											$response['message'] = 'Phone required';
											EchoResponse(200, $response);
							}else if($message=='') {
											$response["error"]=true;
											$response['message'] = 'Message required';
											EchoResponse(200, $response);
							}else{
											$data = array(
												'name'=>$name,
												'email'=>$email,
												'phone'=>$phone,
												'message'=>$message,
												
										);	
															
										$query=$this->db->insert('contact',$data);
										$insert = $this->db->insert_id();
										if ($insert > 0) {
											    $response["error"]=false;
												$response["message"] ='Admin will shortly Contact you';
												EchoResponse(200, $response);
										}else{
												$response["error"]=true;
												$response["message"] =  'Failed to Contact';
												EchoResponse(200, $response);
										}
											
											
											
							}
			}
			public function update(){
			    $username=$_POST['username'];
			    $password=$_POST['password'];
			    $phone=$_POST['phone'];
				$pic=$_FILES["pic"]["name"];
				$user_id=$_POST['user_id'];
				$rec=$this->checkuser($_POST['user_id']);
				
					        if(empty($rec)) {
											$response["error"]=true;
											$response['message'] = 'User not found';
											EchoResponse(200, $response);
							}elseif($username==''){
								
										    $response["error"]=true;
											$response["message"] =  'UserName required';
											EchoResponse(200, $response);
							}elseif($password==''){
								
											$response["error"]=true;
											$response["message"] =  'Password required';
											EchoResponse(200, $response); 
							}elseif($phone==''){
								
											$response["error"]=true;
											$response["message"] =  'Phone required';
											EchoResponse(200, $response); 
							}elseif($pic==''){
								
											$response["error"]=true;
											$response["message"] =  'User Pic required';
											EchoResponse(200, $response); 
							}else{
											$temp = explode(".", $_FILES["pic"]["name"]);
											$extension = end($temp);
											$path="./assets/user_images/";

											 $filename = basename($_FILES["pic"]["name"]);
											 $filename = time().".".$extension; // Original Image
											 if(move_uploaded_file($_FILES["pic"]["tmp_name"],$path . $filename)){
														
												$filename= $filename;
														

											}else{
												$response["error"]=true;
											    $response["message"] =  'User Pic Upload Failed';
											    EchoResponse(200, $response); 		
											}
												
			
								            $data = array(
												'username'=>$username,
												'password'=>md5($password),
												'phone'=>$phone,
												'pic'=>$filename,
												
												
										);	
											   $this->db->where('user_id',$user_id);	
										$query=$this->db->update('api_users',$data);
										
										if ($query) {
											    $response["error"]=false;
												$response["message"] ='User Update Successfully';
												EchoResponse(200, $response);
										}else{
												$response["error"]=true;
												$response["message"] =  'Failed to Update';
												EchoResponse(200, $response);
										}
								
							}
				
				
				
				
				
			}	
			public function histroy(){
				$rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				
				$user_id=$PostData->user_id;
				$rec=$this->checkuser($user_id);
				
					        if(empty($rec)) {
											$response["error"]=true;
											$response['message'] = 'User not found';
											EchoResponse(200, $response);
							}else if($user_id==""){
								            $response["error"]=true;
											$response['message'] = 'User id required';
											EchoResponse(200, $response);
								
							}else{
										   $sql="SELECT p.*,t.*
											FROM api_users p
											JOIN history pt ON p.user_id = pt.uid
											JOIN vehicals t ON pt.vid = t.vehical_id 
											WHERE p.user_id = '$user_id'";    
                                            $rec = $this->db->query($sql)->result();
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
				
			}
			public function dhistroy(){
				$rawData = file_get_contents('php://input');
				$PostData = json_decode($rawData);
				$id=$PostData->user_id;
				$rec=$this->checkuser($id);
				
					        if(empty($rec)) {
											$response["error"]=true;
											$response['message'] = 'User not found';
											EchoResponse(200, $response);
							}else if($id=='') {
											$response["error"]=true;
											$response['message'] = 'User ID required';
											EchoResponse(200, $response);
							}else{
											$this->db->select('*');
											$this->db->like('vehicals.user_id',$id);
											$this->db->from('vehicals');
											$this->db->join('api_users','api_users.user_id = vehicals.user_id');
											$rec = $this->db->get()->result();
											
											if (!empty($rec)) {
											  
												$response["error"]=false;
												$response['data'] = $rec;
												EchoResponse(200, $response);
											}else{
													$response["error"]=true;
													$response["message"] =  'No Ride found againts this location';
													EchoResponse(200, $response);
											}
											
											
											
							}
			}
			
			
			
}
?>
