<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    //Loading url helper
		$this->load->helper('url');
    }

	public function home_page($page = 'home') {
 
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}
}
