<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_form extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('login_model');
		$this->load->library('form_validation');
		//$this->load->controller('dashboard');
		//$this->load->library('session');
		$previous_name = session_name("estore_sess");
		session_start();
    }

    public function index() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
        }
        else {
        	// To protect from MySQL injection for Security purpose
        	$data['username'] = stripslashes($this->input->post('username'));
        	$data['password'] = stripslashes($this->input->post('password'));
        	//$data['username'] = mysqli_real_escape_string($this->input->post('username'));
        	//$data['password'] = mysqli_real_escape_string($this->input->post('password'));

        	//retrieves data from database and later it is matched with the user's input
        	$data['login'] = $this->login_model->login_user($data);

        	//Check if username and password matches
        	$data['status'] = $this->check_status($data);

        	if ($data['status'] == 1) {
        		/* 
        		 * In every login a unique random number is generated and its hashed form in stored in the column named 'random' of the database's table named 'users'.
        		 * Original random number is stored in the cookie
        		 * And when each time a user requests a protected page then the original value from the cookie is compared with the hashed value stored in the database
        		  * In this way authentication is done
        		*/
        		$data['random_no'] = mt_rand();
        		$data['hashed_random_no'] = password_hash($data['random_no'], PASSWORD_BCRYPT);
        		//hashed random value is inserted into the database
        		$this->login_model->store_hash($data['hashed_random_no'], $data['username']);

        		// set cookie
				$cookie = array(
				'name'   => 'estore_auth',
				'value'  => $data['username'].",".$data['random_no'],
				'expire' => time()+24*3600,
				'path'   => '/'
				);
				$this->input->set_cookie($cookie);

	        	//function call to start the login session
	        	$this->login_session($data['username']);

	        	//get session data or info about the user logged in
	        	//if info is correct dashboard is loaded else redirected to login page
	        	$this->info_session();

            } elseif ($data['status'] == 0) {
            	$data['error'] = 1;
            	$this->load->view('templates/header');
            	$this->load->view('pages/login', $data);
            	$this->load->view('templates/footer');	           	
            }
        }

    }

    public function check_status ($data) {
		$data['status'] = 0;
    	 // Check if user exists or not
        if ($data['login']->num_rows() > 0) {

	        foreach ($data['login']->result() as $row) {

	        	$hash = $row->password;
                if ($data['username'] == $row->username && password_verify($data['password'],
                 $hash)) {
                	$data['status'] = 1;
                	break;
                } else {
                	$data['status'] = 0;
                }
	        }
		}
		//if user exists set to 1 else set to 0
		return $data['status'];
    }

    public function login_session($data) {

			$_SESSION['login_user'] = $data;

			return $_SESSION['login_user']; // Initializing Session

    }

    public function info_session() {

		$user_check = $_SESSION['login_user'];//username from the $_SESSION to $user_check
		$login_session = $this->login_model->session($user_check);//value from database is stored
		$data['login_session'] = $login_session;
		
		if(isset($user_check)) {
			// Storing Session
			$this->load->view('templates/header');
			$this->load->view('pages/dashboard', $data);
			$this->load->view('pages/sidebar', $data);
			$this->load->view('templates/footer');
    	} else {
			// Redirecting To Login Page
			$this->load->view('templates/header');
	        $this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
    }

    public function logout() {
    	//session is destroyed and logout page is loaded
    	if(session_destroy()) {
    	// deletes cookie
		$cookie = array(
		    'name'   => 'estore_auth',
		    'value'  => null,
		    'expire' => time()-3600
		    );
		$this->input->set_cookie($cookie);

    		$this->load->view('templates/header');
    		$this->load->view('pages/logout');
    		$this->load->view('templates/footer');
    	}
    }

}