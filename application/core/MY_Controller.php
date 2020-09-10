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

	 public function paypaldirect() {
 		$this->load->library('Paypal');
 		$_SESSION['formdata'] = $_POST;
 		$params = array(
 			'total' 			=> 5,
 			'currency' 			=> 'USD',
 			'localecode' 		=> 'us',
 			// 'total' 			=> $_SESSION['formdata']['Amount'],
 			// 'currency' 			=> $_SESSION['formdata']['currency'],
 			// 'localecode' 		=> $_SESSION['formdata']['localecode'],
 			'customeremail' 	=> $this->session->userdata('email'),
 			'itemname' 			=> COMPANY_NAME,
 			// 'itemname' 			=> COMPANY_NAME . ' - ' . $_SESSION['formdata']['PAYMENT_FOR'],
 			'itemamt' 			=>5,
 			// 'itemamt' 			=> $_SESSION['formdata']['Amount'],
 			'itemqty' 			=> 1,
 			'recurring' 		=>  false,
 			'recurring_freq' 	=>  '',
 		);

 		$result = $this->paypal->SetExpressCheckout($params);
 		if (is_array($result) and !isset($result[0])) {
 			if (strtoupper($result['ACK']) == 'SUCCESS') {
 				if (isset($result['TOKEN'])) {
 					$resultget = $this->paypal->GetExpressCheckoutDetails($result['TOKEN']);
 					$_SESSION['paypal_token'] = strval($resultget['TOKEN']);
 					return ($this->message('primary', '<b><i class="fas fa-spinner fa-pulse"></i></b> Processing payment...', $resultget['TOKEN']));
 				} else
 					return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No token received from PayPal'));
 			} else
 				return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> ' . $result['L_LONGMESSAGE0']));
 		} else {
 			return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No Response from PayPal'));
 		}
 	}


 	public function paypalreturn() {
 		$this->load->library('Paypal');
 		$params = array(
 			// 'total' 			=> $_SESSION['formdata']['Amount'],
			// 'currency' 			=> $_SESSION['formdata']['currency'],
			// 'localecode' 		=> $_SESSION['formdata']['localecode'],
			'total' 			=> 5,
			'currency' 			=> 'USD',
			'localecode' 		=> 'us',
 			'customeremail' 	=> $this->session->userdata('email'),
 			'itemname' 			=> COMPANY_NAME,
			// 'itemamt' 			=> COMPANY_NAME . ' - ' . $_SESSION['formdata']['PAYMENT_FOR'],
 			'itemamt' 			=>5,
					// 'itemamt' 			=> $_SESSION['formdata']['Amount'],
 			'itemqty' 			=> 1,
			'recurring' 		=>  false,
 			'recurring_freq' 	=>  '',
 		);

 		$result_paypal_success = $this->paypal->DoExpressCheckoutPayment($params, $_SESSION['paypal_token'], $_POST['payerID']);
 		if (is_array($result_paypal_success) and !isset($result_paypal_success[0])) {
 			if (strtoupper($result_paypal_success['ACK']) == 'SUCCESS') {

 				if (isset($_SESSION['formdata']['Recurring_Frequency']) && $_SESSION['formdata']['Recurring']) {
 					$result_paypal_recurr = $this->paypal->CreateRecurringPaymentsProfile($params, $_SESSION['paypal_token']);
 					if (is_array($result_paypal_success) and !isset($result_paypal_success[0])) {
 						if (strtoupper($result_paypal_success['ACK']) == 'SUCCESS') {
 							$trans = $trans = '111111';
 							return ($this->message('success', '<b>Success:</b> Payment successful. Recurring payment is now active.', $trans));
 						} else {
 							unset($_SESSION['formdata']['Recurring']);
 							unset($_SESSION['formdata']['Recurring_Frequency']);

 							$trans = $trans = '111111';
 							return ($this->message('danger', '<b>Warning:</b> Payment is successful but failed to set up recurring payments. ' . $result_paypal_recurr['L_LONGMESSAGE0']));
 						}
 					} else {
 						unset($_SESSION['formdata']['Recurring']);
 						unset($_SESSION['formdata']['Recurring_Frequency']);
 						unset($_SESSION['temp_userID']);
 						$trans = '111111';
 						return ($this->message('danger', '<b>Warning:</b> Payment is successful but failed to set up recurring payments. No Response from PayPal.'));
 					}
 				} else {
 					$trans = $trans = '111111';
 					return ($this->message('success', '<b>Success:</b> Payment successful.', $trans));
 				}
 			} else {
 				return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> ' . $result_paypal_success['L_LONGMESSAGE0']));
 			}
 		} else {
 			return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No Response from PayPal.'));
 		}
 	}

	private function message($status, $message, $link = '', $validate = '',$errornames='') {
		return array(
			'status' 	=> $status,
			'response' 	=> $message,
			'link' 		=> $link,
			'validate' 	=> $validate,
			'errornames'	=> $errornames,
		);
	}

}
