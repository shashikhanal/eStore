<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {
	public function __construct() {
	    parent::__construct();
	    //Loading url helper
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('login_model');
		$this->load->model('register_model');
		$this->load->library('form_validation');

		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
		$this->load->helper('array');
    }

    public function index() {

		if($this->input->cookie('estore_auth')!='') {
	   		if($this->login_model->authentication()) {
		    	
		    	$this->load->view('templates/header');
		    	$data['document'] = 1;
		    	$this->load->view('pages/upload_music', $data);
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

    public function do_upload() {
    	
		if($this->input->cookie('estore_auth')!='') {
	   		if($this->login_model->authentication()) {
		    	//For upload section
		    	$pieces = explode(",", $_COOKIE["estore_auth"]);
	    		$username = $pieces[0];

		    	$config['upload_path']          = './uploads/'.$username.'/music';
		        $config['allowed_types']        = 'mp3|mp4';
		        $config['max_size']             = 10240;

		        $this->load->library('upload', $config);

		        if ( !($this->upload->do_upload()) )  {
		            $error = array('error' => $this->upload->display_errors());

		            $this->load->view('templates/header');
					$this->load->view('pages/upload_music', $error);
					$data['document'] = 1;
					$this->load->view('pages/sidebar', $data);
					$this->load->view('templates/footer');
		            }
		        else {
		            $data = array('upload_data' => $this->upload->data());
		            //get name of the uploaded file
		            $data['file_name'] = $this->upload->data('file_name');

		            $this->register_model->upload_music($data['file_name']);

		            $this->load->view('templates/header');
		            $data['document'] = 1;
		            $data['page'] = 'music/';
		            $this->load->view('pages/upload_success', $data);
		            $this->load->view('pages/sidebar');
					$this->load->view('templates/footer');
		        }

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

    public function download_music() {

    	if($this->input->cookie('estore_auth')!='') {
	   		if($this->login_model->authentication()) {

		    	if(null !==($this->input->post('check-download'))) {
		    		$data['check_download'] = $this->input->post('check-download');
		    		
		    		force_download($data['check_download'], NULL);
		    	}

		    	$data['display_query'] = $this->register_model->show_music();

		    	$this->load->view('templates/header');
		        $this->load->view('pages/download_music', $data);
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

    public function delete_music() {

    	if($this->input->cookie('estore_auth')!='') {
	   		if($this->login_model->authentication()) {

		    	if(null !==($this->input->post('check-delete'))) {
		    		$data['check_delete'] = $this->input->post('check-delete');
		    		
		    		$this->register_model->delete_music($data['check_delete']);
		    	}

		    	$data['display_query'] = $this->register_model->show_music();

		    	$this->load->view('templates/header');
		        $this->load->view('pages/delete_music', $data);
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