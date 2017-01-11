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
		/* 
		POSTS is an associative array that maps a category to the posts for that category.
		E.g. posts[General] = [GeneralPost1, GeneralPost2]
		*/
		$posts = array();
		foreach ($data['categories'] as $category_data) {
			$posts[$category_data->category] = $this->forum_model->getPosts($category_data->cat_id);
		}
		$data['posts'] = $posts;
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

	public function newpost()
	{
		$result = $this->forum_model->addPost();
		if($result!='0' && $result!='')
		{
			echo $result;
		}
	}
}
