<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Causes1 extends CI_Controller {

	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this -> load -> model('home_model');
	}
	
	public function add()
	{	
		$data['title'] = 'Add cause | Get Involved';
		$this->load->view('includes/header',$data);
		$this->load->view('cause_add1',$data);
		$this->load->view('includes/footer');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */