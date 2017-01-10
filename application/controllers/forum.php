<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Forum extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this -> load -> model('forum_model');
	}
	public function index()
	{	
		$data['title'] = 'Get Involved';
		$data['active'] = 'active_link';
		$data['categories'] = $this->forum_model->getForumCategories(); 
		//$data['posts'] = $this->forum_model->getPosts(); 
		//$data['sliders'] = $this->home_model->getSlideListing();
		//$data['causes'] = $this->home_model->getCauseshome();
		//$data['causes_gallery'] = $this->home_model->getCausesGallery();
		//$data['cause_members'] = $this->home_model->getAllCausesMembers();
		//$data['about_us'] = $this->home_model->getAboutUsContent();
		$data['login_action'] = '1';
		//$data['users'] = $this->home_model->getUsersDetails();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			// $data['notification_top'] = $this->home_model->getTopNotification();
			// $data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			
			// $data['member_notification_top'] = $this->home_model->getTopMemberNotification();
			// $data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
		}
		
		$this->load->view('includes/header',$data);
		$this->load->view('forum_index',$data);
		$this->load->view('includes/footer');
	}
}