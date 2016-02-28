<?php
class Register_model extends CI_Model {

	public function __contruct(){
		//database is auto loaded using /config/autoload.php
		//$this->load->database();
	}

	public function register_user ($data) {
		$this->load->helper('url');
		/* $query = 'CREATE TABLE '.$data['username'].' (';
        $query .= 'id int(11) NOT NULL AUTO_INCREMENT,'; 
        $query .= ' username varchar(128) NOT NULL,';
        $query .= ' password varchar(128) NOT NULL,'; 
        $query .= ' email varchar(128) NOT NULL,';
        $query .= ' PRIMARY KEY (id));';
        */
		//this table is created to store the name of the uploaded content of the user
		$query = 'CREATE TABLE '.$data['username'].'_doc'.' (';
        $query .= 'id int(11) NOT NULL AUTO_INCREMENT,';
        $query .= ' document varchar(128) NOT NULL,';
        $query .= ' PRIMARY KEY (id));';
		$this->db->query($query);

		$query = 'CREATE TABLE '.$data['username'].'_pic'.' (';
        $query .= 'id int(11) NOT NULL AUTO_INCREMENT,';
        $query .= ' picture varchar(128) NOT NULL,';
        $query .= ' PRIMARY KEY (id));';
		$this->db->query($query);

		$query = 'CREATE TABLE '.$data['username'].'_music'.' (';
        $query .= 'id int(11) NOT NULL AUTO_INCREMENT,';
        $query .= ' music varchar(128) NOT NULL,';
        $query .= ' PRIMARY KEY (id));';
		$this->db->query($query);

		$query = 'CREATE TABLE '.$data['username'].'_vid'.' (';
        $query .= 'id int(11) NOT NULL AUTO_INCREMENT,';
        $query .= ' video varchar(128) NOT NULL,';
        $query .= ' PRIMARY KEY (id));';
		$this->db->query($query);

		mkdir("uploads/".$data['username']);
		mkdir("uploads/".$data['username']."/document");
		mkdir("uploads/".$data['username']."/picture");
		mkdir("uploads/".$data['username']."/music");
		mkdir("uploads/".$data['username']."/video");

		return $this->db->insert('users', $data);
	}

	//this function adds the full path of the file into the table assigned to each user
	public function upload_document($file_name) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];
	    $file_name = "uploads/".$username."/document/".$file_name;

	    $query = "insert into `$username"."_doc`"." (`id`, `document`)";
	    $query .= " values (NULL, '$file_name');";
		return $this->db->query($query);
	}

	public function show_document() {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    $query = $this->db->query("select document from `$username"."_doc`");
	    return $query;
	}

	public function delete_document($check_delete) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    unlink($check_delete);

	    $query = $this->db->query("delete from `$username"."_doc`"." where document ='$check_delete'");
	    return $query;
	}

	//this function adds the full path of the file into the table assigned to each user
	public function upload_picture($file_name) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];
	    $file_name = "uploads/".$username."/picture/".$file_name;

	    $query = "insert into `$username"."_pic`"." (`id`, `picture`)";
	    $query .= " values (NULL, '$file_name');";
		return $this->db->query($query);
	}

	public function show_picture() {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    $query = $this->db->query("select picture from `$username"."_pic`");
	    return $query;
	}

	public function delete_picture($check_delete) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    unlink($check_delete);

	    $query = $this->db->query("delete from `$username"."_pic`"." where picture ='$check_delete'");
	    return $query;
	}

	//this function adds the full path of the file into the table assigned to each user
	public function upload_music($file_name) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];
	    $file_name = "uploads/".$username."/music/".$file_name;

	    $query = "insert into `$username"."_music`"." (`id`, `music`)";
	    $query .= " values (NULL, '$file_name');";
		return $this->db->query($query);
	}

	public function show_music() {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    $query = $this->db->query("select music from `$username"."_music`");
	    return $query;
	}

	public function delete_music($check_delete) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    unlink($check_delete);

	    $query = $this->db->query("delete from `$username"."_music`"." where music ='$check_delete'");
	    return $query;
	}

	//this function adds the full path of the file into the table assigned to each user
	public function upload_video($file_name) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];
	    $file_name = "uploads/".$username."/video/".$file_name;

	    $query = "insert into `$username"."_vid`"." (`id`, `video`)";
	    $query .= " values (NULL, '$file_name');";
		return $this->db->query($query);
	}

	public function show_video() {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    $query = $this->db->query("select video from `$username"."_vid`");
	    return $query;
	}

	public function delete_video($check_delete) {
		$pieces = explode(",", $_COOKIE["estore_auth"]);
	    $username = $pieces[0];

	    unlink($check_delete);

	    $query = $this->db->query("delete from `$username"."_vid`"." where video ='$check_delete'");
	    return $query;
	}

}