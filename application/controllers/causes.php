
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();
error_reporting(0);
class Causes extends CI_Controller {

	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this -> load -> model('home_model');
	}
	
	public function add($val = '')
	{	
		if (($this -> session -> userdata('user_id') == "")) 
		{
			header('location:'.base_url());
		}
		else
		{
			$data['title'] = 'Add cause | Get Involved';
			$data['categories'] = $this->home_model->getCategoriesListing();
			$data['cities'] = $this->home_model->getCityListing();
			$data['causes'] = $this->home_model->getUserCauses();
			$data['val'] = $val;
			$data['login_action1'] = '0';
			if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
			{
				$data['notification_top'] = $this->home_model->getTopNotification();
				$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
				
				$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
				$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
			}
			
			$this->load->view('includes/header1',$data);
			$this->load->view('cause_add',$data);
			$this->load->view('includes/footer');
		}
		
	}
	
	public function cause_modify($cause_id)
	{	
		if (($this -> session -> userdata('user_id') == "")) 
		{
			header('location:'.base_url());
		}
		else
		{
			if($cause_id=='' || $cause_id=='0')
			{
				header('location:'.base_url());
			}
			else
			{
				$data['title'] = 'Modify cause | Get Involved';
				$data['categories'] = $this->home_model->getCategoriesListing();
				$data['cities'] = $this->home_model->getCityListing();
				/*$data['causes'] = $this->home_model->getUserCauses();*/
				$data['details'] = $this->home_model->getCausesDetails($cause_id);
				$data['cause_id'] = $cause_id;
				$data['login_action1'] = '0';
				
				if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
				{
					$data['notification_top'] = $this->home_model->getTopNotification();
					$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
					
					$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
					$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
				}
				
				$this->load->view('includes/header1',$data);
				$this->load->view('cause_modify',$data);
				$this->load->view('includes/footer');
			}
		}
		
	}

	function modify_process()
	{
		$result = $this->home_model->modify_process();
		$cause_id = $this->input->post('cause_id');
		
		/*$data['msg123'] = 'Cause modified Sucessfully.';
		$cause_id = $this->input->post('cause_id');
		$data['title'] = 'Modify cause | Get Involved';
		$data['categories'] = $this->home_model->getCategoriesListing();
		$data['cities'] = $this->home_model->getCityListing();
		
		$data['details'] = $this->home_model->getCausesDetails($cause_id);
		$data['cause_id'] = $cause_id;
		$data['login_action1'] = '0';
		
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			
			$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
			$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
		}
		
		$this->load->view('includes/header1',$data);
		$this->load->view('cause_modify',$data);
		$this->load->view('includes/footer');
		*/
		header('location:'.base_url().'causes/details/'.$cause_id);
		exit();
	}
	
	
	public function mycause()
	{	
		if (($this -> session -> userdata('user_id') == "")) 
		{
			header('location:'.base_url());
		}
		else
		{
			$data['active_cause_detail'] = 'active_link';
			$data['title'] = 'My Cause cause | Get Involved';
			$data['categories'] = $this->home_model->getCategoriesListing();
			$data['causes'] = $this->home_model->getUserCauses();
			$data['join_causes'] = $this->home_model->getUserJoinedCauses();
			if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
			{
				$data['notification_top'] = $this->home_model->getTopNotification();
				$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
				
				$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
				$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
			}
			$this->load->view('includes/header1',$data);
			$this->load->view('mycause',$data);
			$this->load->view('includes/footer');
		}
		
	}
	
	/*$bfile = '';
		if (empty($_FILES['exampleInputFile']['name'])) 
		{
			$result = $this->home_model->add_process($bfile);
		}
		else
		{
			$fname = $_FILES['exampleInputFile']['name'];
			$finfo =  pathinfo($_FILES['exampleInputFile']['name']);
			$extension = strtolower($finfo['extension']);
			$t1 = substr(rand(),1,1);
			$bfile = $fname;
			
			if(file_exists("causes_images/$fname"))
			{
				$change = $t1.'.'.$extension;
				$bfile = $t1."".$bfile;
				
			}	
			
			@move_uploaded_file($_FILES["exampleInputFile"]["tmp_name"], "./causes_images/".$bfile);
			$result = $this->home_model->add_process($bfile);
		}
		*/
		
		/*if($result)
		{
			header('location:'.base_url().'causes/added/1');
			exit;
		}
		else
		{
			header('location:'.base_url().'causes/added/2');
			exit;
		}
		*/
	function add_process()
	{
		$result = $this->home_model->add_process();
		//$this->sucess();
		//header('location:'.base_url().'causes/added');
		//exit;
		if($result)
		{
			$data['msg123'] = 'Cause ignited sucessfully.';
		}
		else
		{
			$data['msg123'] = "Cause couldn't ignite. try Again.";
		}
		$data['title'] = 'Add cause | Get Involved';
		
		//$data['categories'] = $this->home_model->getCategoriesListing();
		//$data['causes'] = $this->home_model->getUserCauses();
		/*$this->load->view('includes/header1',$data);
		$this->load->view('cause_add',$data);
		$this->load->view('includes/footer');
		*/
		
		$data['title'] = 'Get Involved';
		$data['sliders'] = $this->home_model->getSlideListing();
		$data['causes'] = $this->home_model->getCauses();
		$data['causes_gallery'] = $this->home_model->getCausesGallery();
		$data['cause_members'] = $this->home_model->getAllCausesMembers();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
		$this->load->view('includes/header',$data);
		$this->load->view('index',$data);
		$this->load->view('includes/footer');
		
		
	}
	public function sucess()
	{
		header('location:'.base_url().'causes/added');
		exit;
	}
	public function added()
	{	
		$data['title'] = 'Add cause | Get Involved';
		//if($msg=='1')
		//{
			$data['msg'] = 'Cause ignited Sucessfully. Add more Cause';
		/*}
		else
		{
			$data['msg'] = "Blog couldn't Add. try Again.";
		}*/
		$data['categories'] = $this->home_model->getCategoriesListing();
		$data['causes'] = $this->home_model->getUserCauses();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
		$this->load->view('includes/header1',$data);
		$this->load->view('cause_add',$data);
		$this->load->view('includes/footer');
	}
	
	
	
	public function cause_action()
	{	
		$causememberid = $this->home_model->cause_action();
		if($this->input->post('val')=='1')
		{
			$data['userdetails'] = $this->home_model->getUserDetailsByCauseId();
			
			
			$email = $data['userdetails'][0]->email;
			$data['name'] = $data['userdetails'][0]->fname;
			$data['cause_id'] = $data['userdetails'][0]->cause_id;
			$data['causememberid'] = $causememberid;
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
			
			$this -> email -> subject('GI Member Request email');
			
			$message = $this->load->view('email_request.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
			
			
			echo "Your Request for Joining this cause has been sent.";
		}
		else
		{
			echo "You have left this Cause sucessfully.";
		}
	}
	
	function comment_add()
	{
		$bfile = '';
		if (empty($_FILES['comment_image']['name'])) 
		{
			$result = $this->home_model->comment_add($bfile);
		}
		else
		{
			$fname = $_FILES['comment_image']['name'];
			$finfo =  pathinfo($_FILES['comment_image']['name']);
			$extension = strtolower($finfo['extension']);
			$t1 = substr(rand(),1,1);
			$bfile = $fname;
			
			if(file_exists("causes_images/$fname"))
			{
				$change = $t1.'.'.$extension;
				$bfile = $t1."".$bfile;
				
			}	
			
			@move_uploaded_file($_FILES["comment_image"]["tmp_name"], "./causes_images/".$bfile);
			$result = $this->home_model->comment_add($bfile);
		}	
			
			$cause_id = $this->input->post('cause_id');
			
			
			$data['userdetails'] = $this->home_model->getUserDetailsByCauseId();
			$email = $data['userdetails'][0]->email;
			$data['name'] = $data['userdetails'][0]->fname;
			$data['cause_id'] = $data['userdetails'][0]->cause_id;

			if($data['userdetails'][0]->email!=$this->session->userdata('user_email'))
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
				$this -> email -> to($email);
				
				$this -> email -> subject('GI New Comment Email');
				$message = $this->load->view('email_comment.php',$data,true);
				
				$this -> email -> message($message);
				$this -> email -> send();
				
			}
			
		
		$cause_title = str_replace(' ','_',$this->input->post('cause_title'));
		
		header('location:'.base_url().'causes/details/'.$cause_id);
		
	}
	
	
	function cause_more_image()
	{
		$bfile = '';
		$fname = $_FILES['more_images']['name'];
		$finfo =  pathinfo($_FILES['more_images']['name']);
		$extension = strtolower($finfo['extension']);
		$t1 = substr(rand(),1,1);
		$bfile = $fname;
		
		if(file_exists("causes_images/$fname"))
		{
			$change = $t1.'.'.$extension;
			$bfile = $t1."".$bfile;
			
		}	
		
		@move_uploaded_file($_FILES["more_images"]["tmp_name"], "./causes_images/".$bfile);
		$result = $this->home_model->cause_more_image($bfile);
		
		$cause_title = str_replace(' ','_',$this->input->post('cause_title'));
		$cause_id = $this->input->post('cause_id');
		header('location:'.base_url().'causes/details/'.$cause_id);
		
	}
	
	
	public function lists()
	{	
		$data['title'] = 'Causes | Get Involved';
		$data['causes'] = $this->home_model->getCauses();
		$data['categories'] = $this->home_model->getCategoriesListing();
		$data['cause_members'] = $this->home_model->getAllCausesMembers();
		$data['users'] = $this->home_model->getUsersDetails();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
		$this->load->view('includes/header1',$data);
		$this->load->view('list',$data);
		$this->load->view('includes/footer');
		
	}
	
	public function test()
	{	
		
		$this->load->view('includes/header1');
		$this->load->view('email_welcome');
		$this->load->view('includes/footer');
		
	}
	
	public function delete($cause_id)
	{	
		$data['users'] = $this->home_model->delete($cause_id);
		header('location:'.base_url().'causes/mycause');
		
	}
	
	public function unfollow($cause_id)
	{	
		$data['users'] = $this->home_model->unfollow($cause_id);
		header('location:'.base_url().'causes/mycause');
		
	}
	
	public function detail($title)
	{	
		$data['title'] = ucfirst(str_replace('_',' ',$title)).' | Get Involved';
		$data['categories'] = $this->home_model->getCategoriesListing();
		$data['details'] = $this->home_model->getCausesDetails($title);
		$cause_id = $data['details'][0]->id;
		$data['cause_members'] = $this->home_model->getCausesMembers($cause_id);
		$data['cause_comment'] = $this->home_model->getCausesComments($cause_id);
		$data['cause_image'] = $this->home_model->getCausesimages($cause_id);
		$data['abused'] = $this->home_model->getMarkAsAbuse($cause_id);
		$data['users'] = $this->home_model->getUsersDetails();
		$data['notification'] = 'show';
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
		$this->load->view('includes/header1',$data);
		$this->load->view('cause_details',$data);
		$this->load->view('includes/footer');
		
	}
	
	public function details($id)
	{	
		
		$data['categories'] = $this->home_model->getCategoriesListing();
		$data['details'] = $this->home_model->getCausesDetails($id);
		$data['title'] = $data['details'][0]->title.' | Get Involved';
		
		$cause_id = $id;
		$data['cause_members'] = $this->home_model->getCausesMembers($id);
		$data['cause_comment'] = $this->home_model->getCausesComments($id);
		$data['cause_image'] = $this->home_model->getCausesimages($id);
		$data['abused'] = $this->home_model->getMarkAsAbuse($id);
		$data['users'] = $this->home_model->getUsersDetails();
		$data['notification'] = 'show';
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			
			$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
			$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
		}
		
		
		$this->load->view('includes/header1',$data);
		$this->load->view('cause_details',$data);
		$this->load->view('includes/footer');
		
	}
	
	
	public function causegallery($cause_id)
	{	
		$data['title'] = 'Gallery | Get Involved';
		$data['causes_gallery'] = $this->home_model->getCausesGalleryByCause_id($cause_id);
		$data['details'] = $this->home_model->getCausesDetails($cause_id);
		
		$data['cause_id'] = $cause_id;
		$data['users'] = $this->home_model->getUsersDetails();
		$data['notification'] = 'show';
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
			
			$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
			$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
		}
		
		
		$this->load->view('includes/header1',$data);
		$this->load->view('causegallery',$data);
		$this->load->view('includes/footer');
		
	}
	
	
	public function refresh_comments()
	{	
		$id = $this->input->post('cause_id');
		
		$data['categories'] = $this->home_model->getCategoriesListing();
		$data['details'] = $this->home_model->getCausesDetails($id);
		$cause_id = $id;
		$data['cause_members'] = $this->home_model->getCausesMembers($id);
		$data['cause_comment'] = $this->home_model->getCausesComments($id);
		$data['cause_image'] = $this->home_model->getCausesimages($id);
		$data['abused'] = $this->home_model->getMarkAsAbuse($id);
		$data['users'] = $this->home_model->getUsersDetails();
		$this->load->view('refresh_comments',$data);
		
	}
	
	public function remove_comment()
	{	
		$data['users'] = $this->home_model->remove_comment();
		echo "sucess";
	}
	
	public function remove_member()
	{	
		$data['users'] = $this->home_model->remove_member();
		echo "sucess";
	}
	
	
	public function upload_cause_image()
	{	
		$fileName = $_FILES["file1"]["name"]; // The file name
		$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES["file1"]["type"]; // The type of file it is
		$fileSize = $_FILES["file1"]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
		$file_info =  pathinfo($_FILES['file1']['name']);
		$extension = strtolower($file_info['extension']);
		
		list($width, $height, $type, $attr) = getimagesize($_FILES["file1"]['tmp_name']);
		
		if($width > 1080)
		{
			if($extension=='JPEG' || $extension=='jpeg' || $extension=='jpg' || $extension=='JPG' || $extension=='PNG' || $extension=='png')
			{
				if (!$fileTmpLoc) { // if file not chosen
					echo "ERROR: Please browse for a file before clicking the upload button.";
					exit();
				}
				$postid = "cause_".rand().".".$extension;
				$fileName = $postid;
				if(move_uploaded_file($fileTmpLoc, "causes_images/$fileName")){
					$result = $this->home_model->upload_cause_image($fileName);
					echo $fileName.'---'.$result;
				}
			}
		}
		
	}
	
	function areaautocomplet()
	{
		$data['area_list'] = $this->home_model->getareaautocomplet();
		$area_list = $data['area_list'];
		$ul = '';
		if(count($area_list) > 0)
		{
			foreach ($area_list as $rs) {
				$area_name = '';
				$area_name = str_replace($this->input->post('keyword'), '<b>'.$this->input->post('keyword').'</b>', $rs->area);
				$ul .= '<li onclick="set_item(\''.str_replace("'", "\'", $rs->area).'\')" value="'.$rs->area.'">'.$area_name.'</li>';
			}
		}
		else
		{
			$ul .= '<li>No area found</li>';
		}
		echo $ul;
	}
	
	function cityautocomplet()
	{
		$data['city_list'] = $this->home_model->getcityautocomplet();
		$city_list = $data['city_list'];
		$ul = '';
		if(count($city_list) > 0)
		{
			foreach ($city_list as $rs) {
				$area_name = '';
				$area_name = str_replace($this->input->post('keyword1'), '<b>'.$this->input->post('keyword1').'</b>', $rs->city);
				$ul .= '<li onclick="city_set_item(\''.str_replace("'", "\'", $rs->city).'\')" value="'.$rs->city.'">'.$area_name.'</li>';
			}
		}
		else
		{
			$ul .= '<li>No city found</li>';
		}
		echo $ul;
	}
	
	
	
	public function filter()
	{
		$data['title'] = 'Causes | Get Involved';
		$data['causes'] = $this->home_model->getCausesfilter();
		$data['categories'] = $this->home_model->getCategoriesListing();
		
		$data['area_value'] = $this->input->post('areabox');
		$data['city_value'] = $this->input->post('citybox');
		$data['users'] = $this->home_model->getUsersDetails();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
		{
			$data['notification_top'] = $this->home_model->getTopNotification();
			$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		}
		$this->load->view('includes/header1',$data);
		$this->load->view('list',$data);
		$this->load->view('includes/footer');
	}
	
	public function cat_filter()
	{
		$data['causes'] = $this->home_model->getCausescat_filter();
		$data['users'] = $this->home_model->getUsersDetails();
		$this->load->view('cat_filter',$data);
	}
	
	
	public function gallery()
	{	
		$data['title'] = 'Gallery | Get Involved';
		$data['causes'] = $this->home_model->getCauses();
		$data['causes_gallery'] = $this->home_model->getCausesGallery();
		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
			{
				$data['notification_top'] = $this->home_model->getTopNotification();
				$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
				
				$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
				$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
			}

			$this->load->view('includes/header1',$data);
		$this->load->view('gallery',$data);
		$this->load->view('includes/footer');
		
	}
	
	public function notification()
	{
		$data['notification'] = $this->home_model->getNotification();
		$data['users'] = $this->home_model->getUsersDetails();
		$this->load->view('notification',$data);
	}
	
	public function getCommentNotification()
	{
		$data['notification_top'] = $this->home_model->getTopNotification();
		$data['notification_top_count'] = $this->home_model->getTopNotificationCount();
		
		$data['member_notification_top'] = $this->home_model->getTopMemberNotification();
		$data['member_notification_top_count'] = $this->home_model->getTopMemberNotificationCount();
		
		$this->load->view('getCommentNotification',$data);
	}
	
	public function disapprove_member()
	{	
		$result = $this->home_model->disapprove_member();
		echo "sucess";
	}
	
	public function approve_member()
	{	
		$result = $this->home_model->approve_member();
			
			$data['userdetails'] = $this->home_model->getUserDetailsByCauseMemberId();
		
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
			
			$this -> email -> subject('GI Cause join Request accepted Email');
			
			$message = $this->load->view('email_accepted.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
		
		echo "sucess";
	}
	
	
	
	public function email_approve_member($cause_id,$causememberid)
	{	
		$result = $this->home_model->email_approve_member($causememberid);
			
			$data['userdetails'] = $this->home_model->getUserDetailsByCauseMemberId1($causememberid);
			
			

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
			
			$this -> email -> subject('GI Cause join Request accepted Email');
			
			$message = $this->load->view('email_accepted.php',$data,true);
			
			
			$this -> email -> message($message);

			$this -> email -> send();
		
			header('location:'.base_url().'causes/details/'.$cause_id);
			exit;
	}
}
?>