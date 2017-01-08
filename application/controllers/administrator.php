<?php error_reporting(0);  ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this -> load -> model('administrator_model');
	}
	
	public function index()
	{
		if (($this -> session -> userdata('logged_in') == "")) 
		{
			$data['title'] = 'Login | Get Involved';
			$this->load->view('administrator/login',$data);
		}
		else
		{
			$data['title'] = 'DashBoard | Get Involved';
			$data['total_users'] = $this->administrator_model->getTotalUsers();
			$data['total_active_users'] = $this->administrator_model->getActiveTotalUsers();
			$data['total_active_causes'] = $this->administrator_model->getActiveTotalCauses();
			$data['total_causes'] = $this->administrator_model->getTotalCauses();
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/index');
			$this->load->view('administrator/includes/footer');
		}
		
	}
	
	
	public function login()
	{
		$this->load->helper('form');
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('username', 'Email Id', 'trim|required');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required');
		if ($this -> form_validation -> run() == FALSE) 
		{
			$data['title'] = 'Login | Get Involved';
			$this->load->view('administrator/login',$data);
		}
		else
		{
			$username = $this -> input -> post('username');
			$password = md5($this -> input -> post('password'));
			$result = $this->administrator_model->login_process($username, $password);
			if ($result) 
			{
				$data['title'] = 'DashBoard';
				header('Location:'.base_url().'administrator/index');
			}
			else
			{
				$data['title'] = 'Login | Get Involved';
				$data['msg_error'] = 'Enter Correct Email & Password.';
				$this->load->view('administrator/login',$data);
			}
		}
	}
	
	public function logout()
	{
		$newdata = array('admin_id' => '', 'admin_fname' => '', 'admin_lname' => '', 'admin_username' => '', 'logged_in' => '' );
		$this -> session -> sess_destroy();
		header('Location:'.base_url().'administrator/index');
	}
	
	
	function slider_new()
	{
		$data['title'] = 'Slider Image | Get Involved';
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/slider_new',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	public function slide_process()
	{
		$this->load->helper('form');
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('title', 'Slide title', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) 
		{
			$data['title'] = 'Slider Image | Get Involved';
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/slider_new',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			$cout = count($_FILES['slide']['name']);

			$fileArray = '';
			for($i = 0; $i<$cout;$i++)
			{
				list($width, $height, $type, $attr) = getimagesize($_FILES["slide"]['tmp_name'][$i]);
		
				if($width > 1350)
				{
					$fname = $_FILES['slide']['name'][$i];
					$fname_temp = $_FILES['slide']['tmp_name'][$i];
					$file_info =  pathinfo($_FILES['slide']['name'][$i]);
					$extension = strtolower($file_info['extension']);
					$t1 = substr(rand(),1,3);
					$pfname = $fname;
					
					if(file_exists("slider/$fname"))
					{
						$change = $t1.'.'.$extension;
						$pfname = str_replace($extension,$change,$fname);
						
					}	
					@move_uploaded_file($fname_temp, "./slider/".$pfname);
					if(!empty($pfname))
					{
						$fileArray .= $pfname.",";
					}
					$result = $this->administrator_model->slide_process($fileArray);
				}
				else
				{
					$data['error'] = 'Minimum image size should be 1350px';
				}
				
				
			}
			
			
			
			if ($result) 
			{
				$data['title'] = 'Sliders';
				header('Location:'.base_url().'administrator/sliders');
			}
			else
			{
				if($data['error']=='')
				{
					$data['error'] = 'Something went wrong. Try Again later!!!';
				}
				$data['title'] = 'Slider Image | Get Involved';
				$this->load->view('administrator/includes/header',$data);
				$this->load->view('administrator/slider_new',$data);
				$this->load->view('administrator/includes/footer');

			}
		}
	}
	
	function sliders()
	{
		$data['title'] = 'Sliders | Get Involved';
		$data['sliders'] = $this->administrator_model->getSlideListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/sliders',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	public function slider_remove($id)
	{
		$data['locations'] = $this -> administrator_model -> slider_remove($id);
		$data['title'] = 'Sliders | Get Involved';
		$data['msg_sucess'] = 'Slide Removed sucessfully';
		$data['sliders'] = $this->administrator_model->getSlideListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/sliders',$data);
		$this->load->view('administrator/includes/footer');

	}
	
	function pages()
	{
		$data['title'] = 'Pages | Get Involved';
		$data['pages'] = $this->administrator_model->getPageListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/pages',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	function page_modify($id)
	{
		$data['title'] = 'Edit Page | Get Involved';
		$data['pid'] = $id;
		$data['pages'] = $this->administrator_model->getPageContent($id);
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/pages_add',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	
	function pages_add()
	{
		$data['title'] = 'Add page | Get Involved';
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/pages_add',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	public function page_process()
	{
		$this->load->helper('form');
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('title', 'Page Title', 'trim|required');
		$this -> form_validation -> set_rules('content', 'Page Content', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) 
		{
			$data['title'] = 'Add page | Get Involved';
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/pages_add',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			$result = $this->administrator_model->page_process();
			if ($result) 
			{
				header('Location:'.base_url().'administrator/pages');
			}
			else
			{
				$data['title'] = 'Add page | Get Involved';
				$this->load->view('administrator/includes/header',$data);
				$this->load->view('administrator/pages_add',$data);
				$this->load->view('administrator/includes/footer');

			}
		}
	}
	
	
	public function page_modify_process()
	{
		$pid = $this->input->post('pid');
		$this->load->helper('form');
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('title', 'Page Title', 'trim|required');
		$this -> form_validation -> set_rules('content', 'Page Content', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) 
		{
			$data['title'] = 'Edit Page | Get Involved';
			$data['pid'] = $pid;
			$data['pages'] = $this->administrator_model->getPageContent($pid);
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/pages_add',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			$result = $this->administrator_model->page_modify_process();
			if ($result) 
			{
				header('Location:'.base_url().'administrator/pages');
			}
			else
			{
				$data['title'] = 'Edit Page | Get Involved';
				$data['pid'] = $pid;
				$data['pages'] = $this->administrator_model->getPageContent($pid);
				$this->load->view('administrator/includes/header',$data);
				$this->load->view('administrator/pages_add',$data);
				$this->load->view('administrator/includes/footer');

			}
		}
	}
	
	
	public function submit_order()
	{
		$result = $this->administrator_model->submit_order();
		echo "updated";
	}
	
	function categories()
	{
		$data['title'] = 'Categories | Get Involved';
		$data['categories'] = $this->administrator_model->getCategoryListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/categories',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	function categories_add()
	{
		$data['title'] = 'Add Category | Get Involved';
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/categories_add',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	public function categories_process()
	{
		$this->load->helper('form');
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('title', 'Page Title', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) 
		{
			$data['title'] = 'Add Category | Get Involved';
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/categories_add',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			$result = $this->administrator_model->categories_process();
			if ($result) 
			{
				header('Location:'.base_url().'administrator/categories');
			}
			else
			{
				$data['title'] = 'Add Category | Get Involved';
				$this->load->view('administrator/includes/header',$data);
				$this->load->view('administrator/categories_add',$data);
				$this->load->view('administrator/includes/footer');

			}
		}
	}
	
	function category_modify($id)
	{
		$data['title'] = 'Edit Category | Get Involved';
		$data['pid'] = $id;
		$data['categories'] = $this->administrator_model->getCategoryContent($id);
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/categories_add',$data);
		$this->load->view('administrator/includes/footer');
	}
	public function categories_modify_process()
	{
		$pid = $this->input->post('pid');
		$this->load->helper('form');
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('title', 'Page Title', 'trim|required');
		
		if ($this -> form_validation -> run() == FALSE) 
		{
			$data['title'] = 'Edit Category | Get Involved';
			$data['pid'] = $pid;
			$data['categories'] = $this->administrator_model->getCategoryContent($pid);
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/categories_add',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			$result = $this->administrator_model->categories_modify_process();
			if ($result) 
			{
				header('Location:'.base_url().'administrator/categories');
			}
			else
			{
				$data['title'] = 'Edit Category | Get Involved';
				$data['pid'] = $pid;
				$data['categories'] = $this->administrator_model->getCategoryContent($pid);
				$this->load->view('administrator/includes/header',$data);
				$this->load->view('administrator/categories_add',$data);
				$this->load->view('administrator/includes/footer');

			}
		}
	}
	
	function category_option($id,$option)
	{
		$data['users'] = $this->administrator_model->category_option($id,$option);
		header('location:'.base_url().'administrator/categories');
	}
	
	function users()
	{
		$data['title'] = 'Users | Get Involved';
		$data['users'] = $this->administrator_model->getUserListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/users',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	
	function users_option($id,$option)
	{
		$data['title'] = 'Users | Get Involved';
		$data['users'] = $this->administrator_model->users_option($id,$option);
		header('location:'.base_url().'administrator/users');
	}
	
	
	function causes($id='')
	{
		$data['title'] = 'User Causes | Get Involved';
		if($id!='' && $id!='0')
		{
			$data['causes'] = $this->administrator_model->getUserCausesById($id);
		}
		else
		{
			$data['causes'] = $this->administrator_model->getUserCauses();
		}
		
		$data['users'] = $this->administrator_model->getUserListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/causes',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	
	
	function cause_option($id,$option)
	{
		$data['title'] = 'Users | Get Involved';
		$data['users'] = $this->administrator_model->cause_option($id,$option);
		if($option=='Active')
		{
			$data['userdetails'] = $this->administrator_model->getUserDetailsByCauseId($id);
			
			$email = $data['userdetails'][0]->email;
			$data['name'] = $data['userdetails'][0]->fname;
			$data['cause_id'] = $id;
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
			
			$this -> email -> subject('GI Cause Published Email');
			
			$message = $this->load->view('email_published.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
		}
		
		header('location:'.base_url().'administrator/causes');
	}
	
	
	function cause_delete($id)
	{
		$data['title'] = 'Users | Get Involved';
		$data['users'] = $this->administrator_model->cause_delete($id);
		header('location:'.base_url().'administrator/usercauses/1');
	}
	
	function usercauses($id='')
	{
		$data['title'] = 'User Causes | Get Involved';
		if($id!='' && $id!='0')
		{
			$data['error'] = 'Cause deleted sucessfully!!!';
		}
		
		$data['causes'] = $this->administrator_model->getUserCauses();
		
		$data['users'] = $this->administrator_model->getUserListing();
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/causes',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	function abusive()
	{
		$data['title'] = 'Report Abusive | Get Involved';
		$data['abusive'] = $this->administrator_model->getAbusive();
		
		$this->load->view('administrator/includes/header',$data);
		$this->load->view('administrator/abusive',$data);
		$this->load->view('administrator/includes/footer');
	}
	
	function abusive_option($id)
	{
		$data['title'] = 'Report Abusive | Get Involved';
		$data['users'] = $this->administrator_model->abusive_option($id);
		header('location:'.base_url().'administrator/abusive');
	}
	
	function view_cause($id)
	{
		if($id!='' && $id!='0')
		{
			
			$data['causes'] = $this->administrator_model->getCausesById($id);
			$data['categories'] = $this->administrator_model->getCategoryListing();
			$data['pid'] = $id;
			$data['users'] = $this->administrator_model->getUserListing();
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/view_cause',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			$data['causes'] = $this->administrator_model->getUserCauses();
		
			$data['users'] = $this->administrator_model->getUserListing();
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/causes',$data);
			$this->load->view('administrator/includes/footer');
		}
		
	}
	
	function view_cause_update()
	{
		$id = $this->input->post('pid');
		if($id!='' && $id!='0')
		{
			$data['pid'] = $id;
			$result = $this->administrator_model->view_cause_update();
			$data['error'] = 'Cause updated sucessfully!!!';
			$data['causes'] = $this->administrator_model->getCausesById($id);
			$data['categories'] = $this->administrator_model->getCategoryListing();
		
			$data['users'] = $this->administrator_model->getUserListing();
			$this->load->view('administrator/includes/header',$data);
			$this->load->view('administrator/view_cause',$data);
			$this->load->view('administrator/includes/footer');
		}
		else
		{
			header('location:'.base_url().'administrator/causes');
			exit();
		}
		
	}
}


?>