<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
	public function index(){
		$this->load_page('index');
	}

	public function my_profile(){
		$datas = array(
				'profile_user' => $this->get_myprofile(),
		);
		 $this->load_page('profile', $datas);
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

}
?>
