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


	public function non_member(){
		$this->load_page('nonmember');
	}

	public function my_profile(){
		$datas = array(
				'profile_user' => $this->get_myprofile(),
		);
		 $this->load_page('profile', $datas);
	}

	public function display_member(){
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$column_order = array('details.firstname','details.lastname','user.email','details.address','details.image','details.date');
		$join = array('cfmk_users_details as details' => 'details.fk_userid = user.userid');
		$select = "*";
		$where = array('user.user_type' => 2,'user.status !=' =>2);
		$list = $this->MY_Model->get_datatables('cfmk_users as user',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $list['count_all'],
			"recordsFiltered" => $list['count'],
			"data" => $list['data'],
		);
		// echo "<pre>";
		// print_r($list);
		//  exit;
		echo json_encode($output);
	}

	public function display_nonmember(){
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$column_order = array('details.firstname','details.lastname','user.email','details.address','details.image','details.date');
		$join = array('cfmk_users_details as details' => 'details.fk_userid = user.userid');
		$select = "*";
		$where = array('user.user_type' => 3,'user.status !=' =>2);
		$list = $this->MY_Model->get_datatables('cfmk_users as user',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $list['count_all'],
			"recordsFiltered" => $list['count'],
			"data" => $list['data'],
		);
		echo json_encode($output);
	}

	public function member_status(){
		$id     = $_POST['userid'];
		$status = $_POST['status'];
		$fstatus = ($status == 1?0:1);
		$data = array(
			'set' => array('status' => $fstatus),
			'where' => array('userid' => $id)
		);
		$query = $this->MY_Model->update('cfmk_users',$data['set'],$data['where']);
		if ($query) {
			response('success', 'success', 'Successfully updated user');
		} else {
			response('error', 'danger', 'Something went wrong');
		}
	}

	public function get_myprofile(){
		$parameters['join'] = array(
			'cfmk_users_details' => 'cfmk_users_details.fk_userid = cfmk_users.userid',
		);
		$parameters['where'] = array('cfmk_users.userid' => $_SESSION['userid']);
		$parameters['select'] = '*';

		$data = $this->MY_Model->getRows('cfmk_users',$parameters,'row');
		return $data;
	}

	public function update_profile(){
		$respond = array();
		$user_id = $_SESSION['userid'];
		$imgname = "";
		$orig_photo = post('orig_photo', true);
		$password   = (!empty($this->input->post('password'))?$this->input->post('password'):'');

		if (isset($_POST) || isset($_FILES)) {

			if (empty($_POST['password'])) {
				unset($_POST['password']);
				unset($_POST['confirm_password']);
			}

				foreach ($_POST as $key => $value) {
					if($value == ''){
						$respond[$key] = form_error($key);
					}
				}

				// for profile_picture
				$fname  	= $this->input->post('first_name');
				$lname  	= $this->input->post('last_name');
				$email  	= $this->input->post('email');
				$address	= $this->input->post('address');
				$orig_image = $this->input->post('orig_photo');
				$data1 		= $this->input->post('view_imagebase64');
				$first_img  = $orig_image == 'profile_image.png'?'':$orig_image;
				$file_path  = !empty($first_img)?'./assets/profile_picture/'. $first_img:'';
				// echo '<pre>';
				// print_r($file_path);
				// exit;

				if ($data1 != "data:,") {
					$test = file_exists($file_path) ? unlink($file_path) : "";
					list($type, $data1) = explode(';', $data1);
					list(, $data1)      = explode(',', $data1);
					$data5 = base64_decode($data1);
					$imgname = "image64" . md5(rand()) . ".png";
					$test = file_put_contents("assets/profile_picture/$imgname", $data5);
				} else { }
				$user_details = array(
					'firstname'        => $fname,
					'lastname'         => $lname,
					'address'    		=> $address,
					'date'      => date('Y-m-d'),
				);

				if ($imgname != "") {
					$user_details['image'] = $imgname;
				}

				$query = $this->MY_Model->update('cfmk_users_details', $user_details, array('fk_userid' => $user_id));
				if ($query) {
					$respond['response']	= 'success';
					$respond['type'] 		= 'success';
					$respond['msg'] 		= 'Successfully updated profile details';
				}else {
					$respond['response']	= 'error';
					$respond['type'] 		= 'warning';
					$respond['msg'] 		= 'Something went wrong';
				}
				json($respond);
		}

}
?>
