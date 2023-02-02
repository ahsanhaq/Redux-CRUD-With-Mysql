<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

	function __construct() 
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('admin_model');
        }
	public function index()
	{
		$this->load->view('index');
	}


     
	public function view_news()
	{
		$this->load->view('news');
	}	

 
public function add_news()
	{
		$this->load->view('add_news');
	}	

public function view_activity()
	{
		$this->load->view('view_activity');
	}	

public function add_activity()
	{
		$this->load->view('add_activity');
	}	

public function view_artwork()
	{
		$this->load->view('view_artwork');
	}	

public function view_exemployes()
	{
		$this->load->view('view_exemployes');
	}			
public function view_templates()
	{
		$this->load->view('view_templates');
	}



	
}
