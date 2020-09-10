<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
	public function index(){
		$this->load_page('index');
	}

	public function ajax_payment($paypal = ''){
		if ($paypal == 'direct'){
			echo json_encode($this->paypaldirect());
		} else {
			echo json_encode($this->paypalreturn());
		}
	}


	public function upload_files(){
		// $res = 0;
		$userid = $this->session->userdata('userid');
		$path = "./assets/files/".$userid.'/'.date("Y-m-d");
		$response = array();
		$userid = $this->session->userdata('userid');
		if(!is_dir($path)){
		  mkdir($path,0755,TRUE);
		}
		$config['upload_path']= $path;
		$config['allowed_types']    = 'jpg|jpeg|png';
		$config['max_size'] = '2000024';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			if($error){
				$response = array(
					'response' => 'error',
					'message' => 'Not allowed to upload this file.'
				);
			}
		} else {
			$data = $this->upload->data();
			 $response = array(
				 'response' => 'success',
				 'filename' => $data['file_name']
			 );
		}
		return $response;
	}


	public function add_campaigns(){
		$file = $this->upload_files();
		if ($file['response']=="success") {
			$data = array(
				'amount'		 =>  $this->input->post('amount'),
				'fk_userid'		 =>  $this->session->userdata('userid'),
				'currency'		 =>  $this->input->post('currency'),
				'campaign_title' =>  $this->input->post('campaign_title'),
				'purpose' 		 =>  $this->input->post('purpose'),
				'category' 		 =>  $this->input->post('category'),
				'streetaddress'  =>  $this->input->post('streetaddress'),
				'zip' 			 =>  $this->input->post('zip'),
				'photo' 	     =>  $file['filename'],
				'video' 		 =>  $this->input->post('video'),
				'story' 		 =>  $this->input->post('story'),
				'campaignstatus' =>  0,
				'date' 			 =>  date("Y-m-d"),
				'city' 		     =>  $this->input->post('city'),
				'state' 		 =>  $this->input->post('state'),
				'country' 		 =>  $this->input->post('country'),
				'facebook' 		 =>  $this->input->post('facebook')
			);
			$res = $this->MY_Model->insert('cfmk_campaign',$data);
			echo json_encode( array(
					'response' => 'success')
				);
		}else {
			echo json_encode( array(
					'response' => 'error')
				);
		}
	}

	public function  edit_campaigns(){
		if ($_FILES['photo']['name']=="") {
			$options = array(
				'table' => 'cfmk_campaign',
				'where' => array(
					'campaign_id' =>$this->input->post('campaign_id'),
				),
				'set' => array(
					'amount'		 =>  $this->input->post('amount'),
					'currency'		 =>  $this->input->post('currency'),
					'campaign_title' =>  $this->input->post('campaign_title'),
					'purpose' 		 =>  $this->input->post('purpose'),
					'category' 		 =>  $this->input->post('category'),
					'streetaddress'  =>  $this->input->post('streetaddress'),
					'zip' 			 =>  $this->input->post('zip'),
					'video' 		 =>  $this->input->post('video'),
					'story' 		 =>  $this->input->post('story'),
					'city' 		     =>  $this->input->post('city'),
					'state' 		 =>  $this->input->post('state'),
					'country' 		 =>  $this->input->post('country'),
					'facebook' 		 =>  $this->input->post('facebook')
				)
			);
		}else {
			$file = $this->upload_files();
			$options = array(
				'table' => 'cfmk_campaign',
				'where' => array(
					'campaign_id' =>$this->input->post('campaign_id'),
				),
				'set' => array(
					'amount'		 =>  $this->input->post('amount'),
					'currency'		 =>  $this->input->post('currency'),
					'campaign_title' =>  $this->input->post('campaign_title'),
					'purpose' 		 =>  $this->input->post('purpose'),
					'category' 		 =>  $this->input->post('category'),
					'streetaddress'  =>  $this->input->post('streetaddress'),
					'zip' 			 =>  $this->input->post('zip'),
					'photo' 	     =>  $file['filename'],
					'video' 		 =>  $this->input->post('video'),
					'story' 		 =>  $this->input->post('story'),
					'city' 		     =>  $this->input->post('city'),
					'state' 		 =>  $this->input->post('state'),
					'country' 		 =>  $this->input->post('country'),
					'facebook' 		 =>  $this->input->post('facebook')
				)
			);
		}
		$res = $this->action('update',$options);
		if ($res) {
			$response = array('response'=>'success');
		}else {
				$response = array('response'=>'error');
		}
		echo json_encode($response);
	}

	public function get_my_campaign(){
		$options = array(
			'select' => 'photo,campaign_title,date,campaignstatus,campaign_id',
			'where'  => array('fk_userid'=>$this->session->userdata('userid')),
			'join'   => array()
		);

		$res = $this->MY_Model->getRows('cfmk_campaign',$options,'obj');
		echo json_encode($res);
	}

	public function get_one_campaign($campaignid){
		$options = array(
			'select' => '*',
			'where'  => array('campaign_id'=>$campaignid),
			'join'   => array()
		);

		$res = $this->MY_Model->getRows('cfmk_campaign',$options,'obj');
		echo json_encode($res);
	}

}
?>
