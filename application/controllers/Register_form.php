<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_form extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    //Loading url helper
		$this->load->helper('url');
        $this->load->model('register_model');
    }

    public function index() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username','required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[users.email]');


        if ($this->form_validation->run() === FALSE) {
        		$this->load->view('templates/header');
                $this->load->view('pages/register');
				$this->load->view('templates/footer');
        }
        else {
                $data['username'] = $this->input->post('username');
                //password is hashed
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $data['email'] = $this->input->post('email');
                //insert data from the user into the database via register_model
                $this->register_model->register_user($data);

            	$this->load->view('templates/header');
                $this->load->view('pages/formsuccess', $data);
            	$this->load->view('templates/footer');
        }
    }

}