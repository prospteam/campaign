<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct(){
		$route = $this->router->fetch_class();
		if($route == 'login'){
			if($this->session->has_userdata('logged_in')){
				if ($this->session->userdata('usertype')==1) {
					redirect(base_url());
				}else {
					redirect(base_url('my-campaigns'));
				}

			}
		} else {
			if(!$this->session->has_userdata('logged_in')){
				redirect(base_url('sign-in'));
			}
		}
	}

	public function load_page($page, $data = array()){
		$data['_assets_'] = array(
			'global_assets' => array(
				'css' => array('global.css', 'global2.css'),
				'js' => array('global.js', 'global2.js'),
			),
			'login' => array(
				'css' => array('login.css','login2.css'),
				'js' => array('login.js','login2.js'),
			),
			'home' => array(

				'css' => array('home.css'),
				'js' => array('home.js'),
			),
			'member' => array(

				'css' => array('member.css'),
				'js' => array('member.js'),
			),
			'campaign' => array(

				'css' => array('campaign.css'),
				'js' => array('campaign.js'),
			)
		);
      	$this->load->view('includes/head',$data);
		if($this->session->has_userdata('logged_in')){
			$this->load->view('includes/nav');
		}
      	$this->load->view($page,$data);
      	$this->load->view('includes/footer',$data);
     }

	 public function action($action, $options = array()) {
		 switch ($action) {
			 case 'update':
				 return $this->MY_Model->update($options['table'], $options['set'], $options['where']);
				 break;
			 case 'delete':
				 return $this->MY_Model->delete($options['table'], $options['where']);
				 break;
			 case 'insert':
				 return $this->MY_Model->insert($options['table'], $options['data']);
				 break;
		 }
	 }


	 public function check_valid_email()
	 {
		 $data                        =   array();
		 $data['input_name']          =   array();
		 $data['email_error']         =   array();
		 $data['msg'] = array();
		 $data['validation_status']   =   true;

		 $this->form_validation->set_rules('email', 'email', 'valid_email');
		 if ($this->form_validation->run() == FALSE) {
			 $data['input_name'][]      =  'Email';
			 $data['msg'][]     =   'Invalid Email Address';
			 $data['validation_status'] =   false;

			 $response = array(
				 'response_status'  =>  false,
				 'message'          =>  'Invalid Email Address',
				 'return'           =>  $data
			 );
			 echo json_encode($response);
			 exit;
		 }
	 }

}
