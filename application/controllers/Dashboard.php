<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    //Loading url helper
		$this->load->helper('url');
		$this->load->library('form_validation');
    }
    
	public function dashboard_page ($page = 'dashboard') {
		session_start();
		//echo $_SESSION['login_user'];
		/*if(isset($_SESSION['login_user'])){
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page);
			$this->load->view('templates/footer');
		} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
		*/
		if($this->input->cookie('estore_auth')!='') {
	   		if($this->login_model->authentication()) {
	   			$this->load->view('templates/header');
				$this->load->view('pages/'.$page);
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
