<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class User extends CI_Controller {

	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this -> load -> model('home_model');
	}
	
	public function profile()
	{	
		if (($this -> session -> userdata('user_id') == "")) 
		{
			header('location:'.base_url());
		}
		else
		{
			$data['active_profile'] = 'active_link';
			$data['title'] = 'Update Profile | Get Involved';
			$data['profile'] = $this->home_model->getUserProfile();
			if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
			$this->load->view('includes/header1',$data);
			$this->load->view('update_profile',$data);
			$this->load->view('includes/footer');
		}
		
	}
	
	
	public function timeline($userid='')
	{

		if($userid=='')
		{
			$userid = $this -> session -> userdata('user_id');
		}
		$data['active_timeline'] = 'active_link';
		$data['title'] = 'View Timeline | Get Involved';
		$data['profile'] = $this->home_model->getUserProfileById($userid);
		$data['timeline'] = $this->home_model->gettimeline($userid);
	if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
		
		$data['uid'] = $userid;
		$this->load->view('includes/header1',$data);
		$this->load->view('timeline',$data);
		$this->load->view('includes/footer');
		
	}
	
	public function mark_as_reportive()
	{	
		$result = $this->home_model->mark_as_reportive();
		
		$data['userdetails'] = $this->home_model->getUserDetailsByCommentId();
			
			
			$email = $data['userdetails'][0]->email;
			$data['name'] = $data['userdetails'][0]->fname;
			$data['cause_id'] = $data['userdetails'][0]->cause_id;
			
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

			$this -> email -> from('deepak.santy@gmail.com', 'Get Involved');

			$this -> email -> to($email);
			
			$this -> email -> subject('GI Comment Abused');
			
			$message = $this->load->view('email_abusive.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
		
		//echo "Marked as Reportive By You <span class='mark_count'>(".$result.")</span>";
		echo '<a href="javascript:" onclick="mark_reportive_cancel('.$this->input->post('cause_id').','.$this->input->post('comment_id').')" class="Abusive" title="Cancel">Marked as Abusive By You <span class="mark_count">('.$result.')</span></a>';
	}
	
	public function mark_reportive_cancel()
	{	
		$result = $this->home_model->mark_reportive_cancel();
		//echo "Mark as Reportive <span class='mark_count'>(".$result.")</span>";
		echo '<a href="javascript:" onclick="mark_reportive('.$this->input->post('cause_id').','.$this->input->post('comment_id').')" class="reportive" title="Cancel">Mark as Abusive <span class="mark_count">('.$result.')</span></a>';
	}
		
	public function feedback()
	{
		$femail = $this->input->post('femail');
		$fmobile = $this->input->post('fmobile');
		$fmsg = $this->input->post('fmsg');
		
		if($femail!='' && $fmsg!='')
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

            $config['mailtype'] = 'html'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);

			$this -> email -> from('deepak.santy@gmail.com', 'Get Involved Feedback');

			$this -> email -> to($femail);
			
			$this -> email -> subject('Get Involved Feedback');
			$message = '';
			$message .= 'Mobile No : '.$fmobile."<br>";
			$message .= 'Message : '.$fmsg;
			
			
			$this -> email -> message($message);

			$this -> email -> send();
			echo "sucess";
		}
		
	}
	
}
