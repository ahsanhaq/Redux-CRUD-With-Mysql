<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller 
	{

		function __construct() 
		{
			
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('login_model');
			
		}
		
		
		public function index()
		{
			$this->load->view('login/login');
		}

		public function signup()
		{
			$this->load->view('login/signup');
		}

		public function register()
		{	
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('phone', 'phone', 'required|min_length[11]|max_length[13]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('con_password', 'con_password', 'required|matches[password]');

			
			if ($this->form_validation->run() === TRUE)
			{
				$username=$this->input->post('username');
				$phone=$this->input->post('phone');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$con_password=$this->input->post('con_password');
				
				$array = array(
				'username'=>$username,
				'phone'=>$phone,
				'email'=>$email,
				'password'=>md5($password),
				'con_password'=>md5($con_password),
				'user_role'=> 1,
				);
			
				$res = $this->login_model->user_reg($array);
				
				if($res)
				{
					$this->session->set_flashdata('success', 'User is registered Successfully');
					redirect('login');
				}
				else
				{
					$this->session->set_flashdata('error',"User registration Failed! Something went wrong.");
					redirect('login/signup');
				}
		    }
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('login/signup');
			}
		}
		
		public function login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$res = $this->login_model->user_login($email,$password);
			//print_r($res);exit;
			if($res)
			{
				$user_info = array("email" => $res["email"],"user_role" => $res['user_role'],"admin_id"=>$res["user_id"],
				"login" => 'logged_in');
				$this->session->set_userdata($user_info);
				$this->session->userdata('logged_in',$user_info);
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('error','Email or Password incorrect');
				redirect('login');
			}
		}
		
		public function logout()
		{
			$this->session->sess_destroy();
			//print_r($user_info);exit;
			redirect ('login');
		}
		
		
		public function check_login()
		{
			$user_info = $this->session->all_userdata();
			//print_r($user_info);exit;
			if( $user_info ['login'] != '')
			{
				return true;
			}
			else
			{
				redirect ('login');
			}
		}
		
		
	}
