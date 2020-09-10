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

	public function signup(){
		$this->load->view('register');
	}

	public function addUser(){
		$firstname= $this->input->post('firstname');
		$lastname= $this->input->post('lastname');
		$address= $this->input->post('address');
		$email= $this->input->post('email');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('firstname','Firstname','required');
		$this->form_validation->set_rules('lastname','Lastname','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('email','Email Address','required|is_unique[cfmk_users.email]');
		$this->form_validation->set_rules('password','Password','required');

		// $parameters['where'] = array('email' => $email);
		// $parameters['select'] = 'email';
		// $username_exitst = $this->MY_Model->getRows('cfmk_users',$parameters);

		if($this->form_validation->run() == false){
			$this->load->view('register');
			// $this->load_wordpress_page('index');
		}else{
			$data = array(
				'email' => $email,
				'password'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'user_type' => '3',
				'status' => '1',
			);
			$insert_users = $this->MY_Model->insert('cfmk_users',$data);

			if($insert_users){

			$data2 = array(
				'fk_userid' => $insert_users,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'address' => $address,
			);
			$insert_user_details = $this->MY_Model->insert('cfmk_users_details',$data2);
			}
			if ($insert_user_details) {
				$respond['response']	= 'success';
				$respond['type'] 		= 'success';
				$respond['msg'] 		= 'Successfully Registered';
			}
			json($respond);
		}
	}
}
