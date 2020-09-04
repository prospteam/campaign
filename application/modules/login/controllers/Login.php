<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	public function index(){
		$this->load->view('index');
	}

	public function auth(){
		$email= $this->input->post('email');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('email','Email Address','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == false){
			$this->load->view('index');
			// $this->load_wordpress_page('index');
		}else{
			$data = array();
			$checkemail = $this->MY_Model->auth($email);

			if($checkemail){
				if(password_verify($password,$checkemail->password)){
					$data_array = array(
						'email' => $checkemail->email,
						'logged_in' => true,
						'usertype' => $checkemail->user_type,
						'firstname' => $checkemail->firstname,
						'lastname' => $checkemail->lastname,
						'userid' => $checkemail->userid);
					$this->session->set_userdata($data_array);
					if ($checkemail->user_type==1) {
						redirect(base_url());
					}else {
					  redirect(base_url('my-campaigns'));
					}
				}else{
					$data['msg'] = 'Invalid Account. Please try again';
				}
			}else{
					$data['msg'] = 'Invalid Account. Please try again';
			}
				$this->load->view('index',$data);
				// $this->load_wordpress_page('index',$data);
		}
	}
}
