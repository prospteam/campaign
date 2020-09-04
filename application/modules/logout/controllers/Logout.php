<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function index(){
		$session_data = array('userid','firstname','lastname','email','logged_in','email','usertype');
		$this->session->unset_userdata($session_data);
		redirect(base_url('sign-in'));
	}
}
