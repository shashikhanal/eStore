<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_section extends CI_Controller {
	public function __construct() {
	    parent::__construct();
	    session_start();
	    //Loading url helper
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('login_model');
		$this->load->model('register_model');
		$this->load->library('form_validation');
    }

    public function index() {
    	//session_start();
    	if($this->input->cookie('estore_auth')!='') {
   			if($this->login_model->authentication()){
	   			// Storing Session
				$this->load->view('templates/header');
				$this->load->view('pages/dashboard');
				//$data['document'] = 1;
				$this->load->view('pages/sidebar');
				$this->load->view('templates/footer');
   			} else {
   				// Redirecting To Login Page
				$this->load->view('templates/header');
		        $this->load->view('pages/login');
				$this->load->view('templates/footer');
   			}
    	} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
    }

    public function document() {
    	if($this->input->cookie('estore_auth')!='') {
   			if($this->login_model->authentication()){
	   			
	   			//this gets file names from the database and loads in the view
   				$data['display_query'] = $this->register_model->show_document();

				$this->load->view('templates/header');
				$this->load->view('pages/document', $data);
				$data['document'] = 1;
				$this->load->view('pages/sidebar', $data);
				$this->load->view('templates/footer');
   			} else {
   				// Redirecting To Login Page
				$this->load->view('templates/header');
		        $this->load->view('pages/login');
				$this->load->view('templates/footer');
   			}
    	} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
    }

    public function picture() {
    	if($this->input->cookie('estore_auth')!='') {
   			if($this->login_model->authentication()){
   				//this gets file names from the database and loads in the view
   				$data['display_query'] = $this->register_model->show_picture();

	   			// Storing Session
				$this->load->view('templates/header');
				$this->load->view('pages/picture', $data);
				$data['document'] = 1;
				$this->load->view('pages/sidebar', $data);
				$this->load->view('templates/footer');
   			} else {
   				// Redirecting To Login Page
				$this->load->view('templates/header');
		        $this->load->view('pages/login');
				$this->load->view('templates/footer');
   			}
    	} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
    }

    public function music() {
    	if($this->input->cookie('estore_auth')!='') {
   			if($this->login_model->authentication()){
   				//this gets file names from the database and loads in the view
   				$data['display_query'] = $this->register_model->show_music();

	   			// Storing Session
				$this->load->view('templates/header');
				$this->load->view('pages/music', $data);
				$data['document'] = 1;
				$this->load->view('pages/sidebar', $data);
				$this->load->view('templates/footer');
   			} else {
   				// Redirecting To Login Page
				$this->load->view('templates/header');
		        $this->load->view('pages/login');
				$this->load->view('templates/footer');
   			}
    	} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
    }

    public function video() {
    	if($this->input->cookie('estore_auth')!='') {
   			if($this->login_model->authentication()){
   				//this gets file names from the database and loads in the view
   				$data['display_query'] = $this->register_model->show_video();

	   			// Storing Session
				$this->load->view('templates/header');
				$this->load->view('pages/video', $data);
				$data['document'] = 1;
				$this->load->view('pages/sidebar', $data);
				$this->load->view('templates/footer');
   			} else {
   				// Redirecting To Login Page
				$this->load->view('templates/header');
		        $this->load->view('pages/login');
				$this->load->view('templates/footer');
   			}
    	} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
    }

}