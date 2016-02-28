<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    //Loading url helper
		$this->load->helper('url');
    }

	public function login_page ($page = 'login') {
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //Validation rule
        $this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page);
			$this->load->view('templates/footer');
		} else {
        	$this->load->view('pages/formsuccess');
        }
	}

	public function register_page ($page = 'register') {
		$this->load->helper('form');
        $this->load->library('form_validation');

		$this->load->view('templates/header');
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}

	public function formsuccess_page ($page ='formsuccess') {

		$this->load->view('templates/header');
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}

}