<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this -> load -> model('home_model');
	}
	
	public function index()
	{	
		$data['title'] = 'Get Involved';
		$data['active'] = 'active_link';
		$data['sliders'] = $this->home_model->getSlideListing();
		$data['causes'] = $this->home_model->getCauseshome();
		$data['causes_gallery'] = $this->home_model->getCausesGallery();
		$data['cause_members'] = $this->home_model->getAllCausesMembers();
		$data['about_us'] = $this->home_model->getAboutUsContent();
		$data['login_action'] = '1';
		$data['users'] = $this->home_model->getUsersDetails();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			
			$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
			$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
		}
		
		$this->load->view('includes/header',$data);
		$this->load->view('index',$data);
		$this->load->view('includes/footer');
	}
	
	
	public function login_process()
	{
		$result = $this->home_model->login_process();
		if($result!='0' && $result!='')
		{
			echo $result;
		}
	}
	
	
	
	public function register_process()
	{
		$checkemail = $this->home_model->validateEmail();
		if($checkemail=='0')
		{
			$confirmation_id = time();
			$result = $this->home_model->register_process($confirmation_id);
			if($result!='0' && $result!='')
			{
/*				$this->load->library('email');

            $config['protocol']    = 'smtp';

            $config['smtp_host']    = 'ssl://smtp.gmail.com';

            $config['smtp_port']    = '465';

            $config['smtp_timeout'] = '7';

            $config['smtp_user']    = 'deepak.santy@gmail.com';

            $config['smtp_pass']    = 'Laddu123!@#';

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";

            $config['mailtype'] = 'html';

            $config['validation'] = TRUE;

            $this->email->initialize($config);

			$this -> email -> from('deepak.santy@gmail.com', 'Get Involved');

			$this -> email -> to($this->input->post('email'));
			
			$this -> email -> subject('GI Verify Email');
			$data['name'] = $this->input->post('fname').' '.$this->input->post('lname');
			$data['confirmation_id'] =  $confirmation_id;
			$data['userid'] =  $result;
			$message = $this->load->view('email_verify.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
		*/	
			echo $result;
			}
		}
	}
	
	public function verifyemail($userid,$confirmation_id,$val='')
	{
		
		$result = $this->home_model->verifyemail($userid,$confirmation_id);
		if($result!='0' && $result!='')
		{
			
			$this->load->library('email');

			$config['protocol']    = 'smtp';

			$config['smtp_host']    = 'ssl://smtp.gmail.com';

			$config['smtp_port']    = '465';

			$config['smtp_timeout'] = '7';

			$config['smtp_user']    = 'deepak.santy@gmail.com';

			$config['smtp_pass']    = 'Laddu123!@#';

			$config['charset']    = 'utf-8';

			$config['newline']    = "\r\n";

			$config['mailtype'] = 'html';

			$config['validation'] = TRUE;

			$this->email->initialize($config);

			$this -> email -> from('deepak.santy@gmail.com', 'Get Involved');

			$this -> email -> to($result);
			
			$this -> email -> subject('GI Welcome Email');
			$data['hello'] = 'Hello';
			$message = $this->load->view('email_welcome.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
			
			$data['title'] = 'Get Involved';
			$data['sliders'] = $this->home_model->getSlideListing();
			$data['causes'] = $this->home_model->getCauseshome();
			$data['causes_gallery'] = $this->home_model->getCausesGallery();
			$data['cause_members'] = $this->home_model->getAllCausesMembers();
			$data['about_us'] = $this->home_model->getAboutUsContent();
			$data['login_action'] = '1';
			$data['users'] = $this->home_model->getUsersDetails();
			if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
			{
				$data['notification_top'] = $this->home_model->getTopNotification();
				$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			}
			$data['msg1'] = 'You email has been verified sucessfully.';
			$this->load->view('includes/header',$data);
			$this->load->view('index',$data);
			$this->load->view('includes/footer');
		}
		else
		{
			$data['title'] = 'Get Involved';
			$data['sliders'] = $this->home_model->getSlideListing();
			$data['causes'] = $this->home_model->getCauseshome();
			$data['causes_gallery'] = $this->home_model->getCausesGallery();
			$data['cause_members'] = $this->home_model->getAllCausesMembers();
			$data['about_us'] = $this->home_model->getAboutUsContent();
			$data['login_action'] = '1';
			$data['users'] = $this->home_model->getUsersDetails();
			if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
			{
				$data['notification_top'] = $this->home_model->getTopNotification();
				$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			}
			$data['msg1'] = 'Please Provide valid code to verify email.';
			$this->load->view('includes/header',$data);
			$this->load->view('index',$data);
			$this->load->view('includes/footer');
		}
	}
	
	public function update_profile()
	{
		$result = $this->home_model->update_profile();
		if($result)
		{
			echo "Update";
		}
	}
	
	public function update_password_process()
	{
		$result = $this->home_model->update_password_process();
		if($result)
		{
			echo "Update";
		}
	}
	
	public function forgot_process()
	{
		$password = time();
		$result = $this->home_model->forgot_process($password);
		if($result!='0' && $result!='')
		{
			//$password
			$this->load->library('email');

            $config['protocol']    = 'smtp';

            $config['smtp_host']    = 'ssl://smtp.gmail.com';

            $config['smtp_port']    = '465';

            $config['smtp_timeout'] = '7';

            $config['smtp_user']    = 'deepak.santy@gmail.com';

            $config['smtp_pass']    = 'Laddu123!@#';

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";

            $config['mailtype'] = 'html'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);

			$this -> email -> from('deepak.santy@gmail.com', 'Get Involved Recovery mail');

			$this -> email -> to($this->input->post('email'));
			
			$this -> email -> subject('Password Recovery mail');
			$message = '';
			$message .= 'Your Temporary Password is '.$password."<br>";
			$message .= 'Use this password to access your account and change your password soon.';
			
			
			$this -> email -> message($message);

			$this -> email -> send();
			echo $password;
		}
	}
	
	public function profile_pic()
	{	
		$fileName = $_FILES["file1"]["name"]; // The file name
		$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES["file1"]["type"]; // The type of file it is
		$fileSize = $_FILES["file1"]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
		$file_info =  pathinfo($_FILES['file1']['name']);
		$extension = strtolower($file_info['extension']);
		
		
		if($extension=='JPEG' || $extension=='jpeg' || $extension=='jpg' || $extension=='JPG' || $extension=='PNG' || $extension=='png')
		{
			if (!$fileTmpLoc) { // if file not chosen
				echo "ERROR: Please browse for a file before clicking the upload button.";
				exit();
			}
			if(move_uploaded_file($fileTmpLoc, "profile/$fileName")){
				$result = $this->home_model->profile_pic($fileName);
				echo $fileName;
			}
		}

	}
	public function logout()
	{
		$newdata = array('user_name' => '', 'user_id' => '', 'user_email' => '', 'logged_in' => '' ,'fb_id' => '');
		$this -> session -> sess_destroy();
		header('Location:'.base_url().'home/index');
	}
	
	public function notification_update()
	{
		$result = $this->home_model->notification_update();
		echo "sucess";
	}
	
	public function notification_update1()
	{
	
		$result = $this->home_model->notification_update1();
		echo "sucess";
	}
	
	
	public function test()
	{
		$this->load->view('test1.php',$data);
			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */