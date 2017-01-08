<?php
class Home_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	function getSlideListing()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("sliders");
		return $query->result();
	}
	
	function getCategoriesListing()
	{
		$this->db->where("status",'Active');
		$this->db->order_by("sort_order","ASC");
		$this->db->order_by("title","ASC");
        $query=$this->db->get("categories");
		return $query->result();
	}
	
	function delete($cause_id)
	{
		$this->db->where("id",$cause_id);
		$this->db->delete('causes');
		return true;
	}
	
	function unfollow($cause_id)
	{
		$this->db->where("id",$cause_id);
		$this->db->delete('cause_members');
		return true;
	}
	
	
	function getUserCauses()
	{
		$this->db->where("userid",$this->session->userdata('user_id'));
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("causes");
		return $query->result();
	}
	
	function getUserJoinedCauses()
	{
		$sql = "SELECT a1.id, a1.categories, a1.userid, a1.title, a1.mobile_no, a1.details, a1.city, a1.area, a1.volunters, a1.startdate, a1.enddate, a1.image, a1.phone_no, a1.type, a1.eligibility, a1.total_view, a1.last_updated, a1.sort_order, a1.status, a1.edate,a2.id as cause_member_id,a2.status as request_status,a2.edate as joined_date FROM causes a1 INNER JOIN cause_members a2 ON a1.id = a2.cause_id WHERE a2.userid = '".$this->session->userdata('user_id')."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getCityListing()
	{
		$this->db->order_by("city_name","ASC");
        $query=$this->db->get("cities");
		return $query->result();
	}
	
	function getCausesDetails($id)
	{
		$sql1 = "UPDATE causes SET total_view = total_view + 1 WHERE id = '".$id."'";
        $query1 = $this->db->query($sql1);
		
		$this->db->where("id",$id);
        $query=$this->db->get("causes");
		return $query->result();
	}
	
	function getCauses()
	{
		$this->db->where("status",'Active');
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("causes");
		return $query->result();
	}
	
	function getCauseshome()
	{
		$sql = "SELECT * FROM causes WHERE status = 'Active' AND sort_order <> '' ORDER BY sort_order ASC, edate DESC LIMIT 0,9";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getUsersDetails()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("users");
		return $query->result();
	}
	
	function getUserProfile()
	{
		$this->db->where("id",$this -> session -> userdata('user_id'));
        $query=$this->db->get("users");
		return $query->result();
	}
	
	function getUserProfileById($userid)
	{
		$this->db->where("id",$userid);
        $query=$this->db->get("users");
		return $query->result();
	}
	
	function validateEmail()
    { 	
		$this->db->where("email",$this->input->post('email'));
        $query=$this->db->get("users");
		
        if($query->num_rows()>0)
        {
			
			foreach($query->result() as $rows)
            {
				
				if($rows->status=='Inactive' && $rows->confirmation_id!='')
				{
					$this->db->where("id",$rows->id);
					$this->db->delete('users');
				}
				return 0;
			}
            return 1;
        }
        return 0;
    }
	
	function forgot_process($password)
    { 	
		$this->db->where("email",$this->input->post('email'));
        $query=$this->db->get("users");
		
        if($query->num_rows()>0)
        {	
			$data = array('recovery'=>md5($password));
			$this->db->where("email",$this->input->post('email'));
			$this->db->update('users',$data);
            return 1;
        }
        return 0;
    }
	
	function login_process()
    {
		$this->db->where("status",'Active');
        $this->db->where("email",$this->input->post('email'));
        $this->db->where("password",md5($this->input->post('password')));
		$this->db->or_where('recovery ',md5($this->input->post('password')));
        $query=$this->db->get("users");
        if($query->num_rows()>0)
        {
			$current_time = date('Y-m-d H:i:s');
			$data = array('last_login'=>$current_time);
			$this->db->where("email",$this->input->post('email'));
			$this->db->update('users',$data);
            foreach($query->result() as $rows)
            {
                //add all data to session
                $newdata = array(
                    'user_id'  => $rows->id,
                    'user_name'  => $rows->fname." ".$rows->lname,
                    'user_email'    => $rows->email,
					'logged_in'  => TRUE
                );
            }
            $this->session->set_userdata($newdata);
            return '1';
        }
        return '0';
    }
	
	function register_process($confirmation_id)
	{
		$data = array(
				'fname'=>$this->input->post('fname'),
				'lname'=>$this->input->post('lname'),
				'city'=>$this->input->post('city'),
				'state'=>$this->input->post('state'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'mobile'=>$this->input->post('mobile'),
				'status'=>'Inactive',
				'confirmation_id'=>$confirmation_id,
				'last_login'=>date('Y-m-d H:i:s')
			);
			
		$this->db->insert('users',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{			
			
			/*$newdata = array(
					'user_name'  => $this->input->post('fname')." ".$this->input->post('lname'),
                    'user_id'  => $insertId,
                    'user_email'    => $this->input->post('email'),
					'logged_in'  => TRUE
                );
			$this->session->set_userdata($newdata);
            return $insertId;*/
			return $insertId;
		}
        return 0;
    }
	
	
	function add_process()
	{
		$cat = '';
		foreach($this->input->post('categories') as $catdata)
		{
			if($catdata!='')
			{
				$cat .= $catdata.",";
			}
		}
		$data = array(
					'categories'=>$cat,
					'userid'=>$this -> session -> userdata('user_id'),
					'title'=>$this->input->post('btitle'),
					'mobile_no'=>$this->input->post('bmobile'),
					'details'=>$this->input->post('bdetails'),
					'city'=>$this->input->post('bcity'),
					'area'=>$this->input->post('barea'),
					'volunters'=>$this->input->post('bvolun'),
					'startdate'=>$this->input->post('etime'),
					'type'=>$this->input->post('type'),
					'enddate'=>$this->input->post('etime1'),
					'image'=>$this->input->post('image_value'),
					'last_updated'=>date('Y-m-d H:i:s'),
					'edate'=>date('Y-m-d H:i:s')
				);
				//'phone_no'=>$this->input->post('bphone'),
		$this->db->insert('causes',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{
			return true;
		}
	return false;
	}
	
	
	function modify_process()
	{
		$cat = '';
		foreach($this->input->post('categories') as $catdata)
		{
			if($catdata!='')
			{
				$cat .= $catdata.",";
			}
		}
		$data = array(
					'categories'=>$cat,
					'userid'=>$this -> session -> userdata('user_id'),
					'title'=>$this->input->post('btitle'),
					'mobile_no'=>$this->input->post('bmobile'),
					'details'=>$this->input->post('bdetails'),
					'city'=>$this->input->post('bcity'),
					'area'=>$this->input->post('barea'),
					'volunters'=>$this->input->post('bvolun'),
					'startdate'=>$this->input->post('etime'),
					'type'=>$this->input->post('type'),
					'enddate'=>$this->input->post('etime1'),
					'image'=>$this->input->post('image_value'),
					'last_updated'=>date('Y-m-d H:i:s')
				);
				
		$this->db->where("id",$this->input->post('cause_id'));
		$this->db->update('causes',$data);
		return true;
		
	}
	
	function verifyemail($userid,$confirmation_id)
	{
		
		$sql = "SELECT * FROM users WHERE status = 'Inactive' AND confirmation_id = '".$confirmation_id."' AND id = '".$userid."'";
		$query = $this->db->query($sql);
		
		if($query->num_rows()>0)
        {
			$data = array("confirmation_id"=>"","status"=>"Active");
			$this->db->where("id",$userid);
			$this->db->update('users',$data);
			foreach($query->result() as $rows)
            {
				$newdata = array(
					'user_name'  => $rows->fname." ".$rows->lname,
                    'user_id'  => $rows->id,
                    'user_email'    => $rows->email,
					'logged_in'  => TRUE
                );
				$this->session->set_userdata($newdata);
				return $rows->email;
			}
            
        }
		
		return false;
	}
	
	
	
	function cause_action()
	{
		$val = $this->input->post('val');
		$cause_id = $this->input->post('cause_id');
		$userid = $this->session->userdata('user_id');
		
		if($val=='1')
		{
			//$sql = "UPDATE causes SET eligibility = concat(eligibility,',-".$userid."-') WHERE id = '".$cause_id."'";
			$sql = "INSERT INTO cause_members(`userid`,`cause_id`)VALUES('".$userid."','".$cause_id."')";
			$query = $this->db->query($sql);
			return mysql_insert_id();
		}
		else
		{
			$sql = "DELETE FROM cause_members WHERE cause_id = '".$cause_id."' AND userid = '".$userid."'";
			$query = $this->db->query($sql);
			return true;
		}
		
		
		/*return true;*/
	}
	
	function getCausesMembers($cause_id)
	{
		$this->db->where("cause_id",$cause_id);
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("cause_members");
		
		$data = array("seen"=>"Yes");
		$this->db->where("cause_id",$cause_id);
		$this->db->update('cause_members',$data);
		
		return $query->result();
	}
	
	function getAboutUsContent()
	{
		$this->db->where("id",'1');
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("pages");
		return $query->result();
	}
	
	function getAllCausesMembers()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("cause_members");
		return $query->result();
	}
	
	
	function comment_add($bfile)
	{
		$data = array(
					'userid'=>$this -> session -> userdata('user_id'),
					'cause_id'=>$this->input->post('cause_id'),
					'comment'=>$this->input->post('message'),
					'image'=>$bfile,
					'type'=>'comment',
					'edate'=>date('Y-m-d H:i:s')
				);
				
		$this->db->insert('cause_comments',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{
			return true;
		}
		return false;
	}
	
	
	function cause_more_image($bfile)
	{
		$data = array(
					'userid'=>$this -> session -> userdata('user_id'),
					'cause_id'=>$this->input->post('cause_id'),
					'image'=>$bfile,
					'type'=>'image',
					'edate'=>date('Y-m-d H:i:s')
				);
				
		$this->db->insert('cause_comments',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{
			return true;
		}
		return false;
	}
	
	
	
	
	function getCausesComments($cause_id)
	{
		$this->db->where("type",'comment');
		$this->db->where("cause_id",$cause_id);
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("cause_comments");
		
		$comment_array = array();
		
		if($query->num_rows()>0)
        {
			
			foreach($query->result() as $rows)
            {
				$this->db->where("comment_id",$rows->id);
				$this->db->where("cause_id",$rows->cause_id);
				$this->db->order_by("edate","DESC");
				$query1 = $this->db->get("reportive");
				
				$comment_array[] = array(
											'id' => $rows->id,
											'userid' => $rows->userid,
											'cause_id' => $rows->cause_id,
											'name' => $rows->name,
											'subject' => $rows->subject,
											'type' => $rows->type,
											'comment' => $rows->comment,
											'image' => $rows->image,
											'seen' => $rows->seen,
											'status' => $rows->status,
											'edate' => $rows->edate,
											'abusive' => $query1->result_array()
										);
			}
			
			return $comment_array;
		}
		return false;
	}
	
	function getCausesimages($cause_id)
	{
		$this->db->where("type",'image');
		$this->db->where("cause_id",$cause_id);
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("cause_comments");
		return $query->result();
	}
	
	
	function getCausesGallery()
	{
		$sql1 = "SELECT * FROM cause_comments WHERE image !='' ORDER BY edate DESC";
		$query1 = $this->db->query($sql1);
		return $query1->result();
	}
	
	
	function getCausesGalleryByCause_id($cause_id)
	{
		$sql1 = "SELECT * FROM cause_comments WHERE cause_id = '".$cause_id."' AND image !='' ORDER BY edate DESC";
		$query1 = $this->db->query($sql1);
		return $query1->result();
	}
	
	function remove_comment()
    {
		$this->db->where("id",$this->input->post('id'));
        $this->db->delete('cause_comments');
        return true;
    }
	
	function mark_as_reportive()
    {
		$count = '';
        
		$sql1 = "INSERT INTO `reportive` SET `total`= '1',cause_id = '".$this->input->post('cause_id')."',comment_id ='".$this->input->post('comment_id')."',userid = '".$this -> session -> userdata('user_id')."'";
		$query1 = $this->db->query($sql1);
		
		$sql = "SELECT * FROM reportive WHERE cause_id ='".$this->input->post('cause_id')."' AND comment_id ='".$this->input->post('comment_id')."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
    }
	
	function mark_reportive_cancel()
    {
		$count = '';
        
		$sql1 = "DELETE FROM `reportive` WHERE cause_id = '".$this->input->post('cause_id')."' AND comment_id ='".$this->input->post('comment_id')."' AND userid = '".$this -> session -> userdata('user_id')."'";
		$query1 = $this->db->query($sql1);
		
		$sql = "SELECT * FROM reportive WHERE cause_id ='".$this->input->post('cause_id')."' AND comment_id ='".$this->input->post('comment_id')."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
    }
	
	function getMarkAsAbuse($cause_id)
	{
		$this->db->where("cause_id",$cause_id);
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("reportive");
		return $query->result();
	}
	
	
	function remove_member()
    {
		$this->db->where("userid",$this->input->post('userid'));
		$this->db->where("cause_id",$this->input->post('cause_id'));
        $this->db->delete('cause_members');
        return true;
    }
	
	function getareaautocomplet()
	{
		$keyword = $this->input->post('keyword');
		$sql = "SELECT * FROM causes WHERE area LIKE '%".$keyword."%' Group By area ORDER BY edate DESC LIMIT 0, 10";
        $query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function getcityautocomplet()
	{
		$keyword1 = $this->input->post('keyword1');
		$sql = "SELECT * FROM causes WHERE city LIKE '%".$keyword1."%' Group By city ORDER BY edate DESC LIMIT 0, 10";
        $query = $this->db->query($sql);
		return $query->result();
		
	}
	
	function getCausesfilter()
	{
		$search = '';
		$search1 = '';
		$search2 = '';
		
		if($this->input->post('areabox')!='')
		{
			$search1 = "AND area LIKE '%".$this->input->post('areabox')."%'";
		}
		
		if($this->input->post('citybox')!='')
		{
			$search2 = "AND city LIKE '%".$this->input->post('citybox')."%'";
		}
		
		$sql = "SELECT * FROM causes WHERE 1 ".$search1." ".$search2." AND status = 'Active' ORDER BY edate DESC LIMIT 0, 20";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	
	function getCausescat_filter()
	{
		$search1 = '';
		$search2 = '';
		
		if($this->input->post('area_value')!='')
		{
			$search1 = "AND area LIKE '%".$this->input->post('area_value')."%'";
		}
		
		if($this->input->post('city_value')!='')
		{
			$search2 = "AND city LIKE '%".$this->input->post('city_value')."%'";
		}
		
		$sql = "SELECT * FROM causes WHERE 1 ".$search1." ".$search2." AND (categories LIKE '".$this->input->post('cat_id').",%' OR categories LIKE '%,".$this->input->post('cat_id').",%') AND status = 'Active' ORDER BY edate DESC LIMIT 0, 20";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	
	function upload_cause_image($bfile)
	{
		$data = array(					
					'image'=>$bfile,
					'edate'=>date('Y-m-d H:i:s')
				);
				
		$this->db->insert('cause_temp',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{
			return $insertId;
		}
		return false;
	}
	
	
	function profile_pic($bfile)
	{
		$data = array(					
					'image'=>base_url()."profile/".$bfile,
				);
		
		$this->db->where("id",$this->session->userdata('user_id'));
		$this->db->update('users',$data);
		
		return true;
	}
	
	
	function update_profile()
	{
		$data = array(
				'fname'=>$this->input->post('fname'),
				'lname'=>$this->input->post('lname'),
				'city'=>$this->input->post('city'),
				'state'=>$this->input->post('state'),
				'brief'=>$this->input->post('brief'),
				'mobile'=>$this->input->post('mobile'),
			);
		
		$this->db->where("id",$this->session->userdata('user_id'));
		$this->db->update('users',$data);
		return true;
    }
	
	function update_password_process()
	{
		$data = array(
				'password'=>md5($this->input->post('cpwd')),
				'recovery'=>''
			);
		
		$this->db->where("email",$this->input->post('cemail'));
		$this->db->update('users',$data);
		return true;
    }
	
	
	function gettimeline($userid)
	{
		$timelineArray = array();
		
		/*$sql = "SELECT a1.id, a1.categories, a1.userid, a1.title, a1.mobile_no, a1.details, a1.city, a1.area, a1.volunters, a1.startdate, a1.enddate, a1.image, a1.phone_no, a1.type, a1.eligibility, a1.total_view, a1.last_updated, a1.status, a1.edate FROM causes a1 LEFT JOIN cause_members a2 ON (a1.id = a2.cause_id OR a1.userid = '".$userid."') WHERE (a1.userid = '".$userid."' OR a2.userid = '".$userid."') AND a2.status = 'Active' ORDER BY a1.edate DESC";
		
        $query = $this->db->query($sql);
		
		return $query->result();*/
		
		$sql = "SELECT * FROM causes WHERE userid = '".$userid."' ORDER BY edate DESC";
		$query = $this->db->query($sql);
		
		if($query->num_rows()>0)
        {
			foreach($query->result() as $rows)
            {
				$timelineArray[] = array(
										'id' => $rows->id,
										'categories' => $rows->categories,
										'userid' => $rows->userid,
										'title' => $rows->title,
										'mobile_no' => $rows->mobile_no,
										'details' => $rows->details,
										'city' => $rows->city,
										'area' => $rows->area,
										'volunters' => $rows->volunters,
										'startdate' => $rows->startdate,
										'enddate' => $rows->enddate,
										'image' => $rows->image,
										'phone_no' => $rows->phone_no,
										'type' => $rows->type,
										'eligibility' => $rows->eligibility,
										'total_view' => $rows->total_view,
										'last_updated' => $rows->last_updated,
										'status' => $rows->status,
										'edate' => $rows->edate
										);
			}
		}
		
		
		$sql = "SELECT a1.id, a1.categories, a1.userid, a1.title, a1.mobile_no, a1.details, a1.city, a1.area, a1.volunters, a1.startdate, a1.enddate, a1.image, a1.phone_no, a1.type, a1.eligibility, a1.total_view, a1.last_updated, a1.status, a1.edate FROM causes a1 INNER JOIN cause_members a2 ON a1.id = a2.cause_id WHERE a2.userid = '".$userid."' AND a2.status = 'Active' ORDER BY a1.edate DESC";
		$query = $this->db->query($sql);
		
		if($query->num_rows()>0)
        {
			foreach($query->result() as $rows)
            {
				$timelineArray[] = array(
										'id' => $rows->id,
										'categories' => $rows->categories,
										'userid' => $rows->userid,
										'title' => $rows->title,
										'mobile_no' => $rows->mobile_no,
										'details' => $rows->details,
										'city' => $rows->city,
										'area' => $rows->area,
										'volunters' => $rows->volunters,
										'startdate' => $rows->startdate,
										'enddate' => $rows->enddate,
										'image' => $rows->image,
										'phone_no' => $rows->phone_no,
										'type' => $rows->type,
										'eligibility' => $rows->eligibility,
										'total_view' => $rows->total_view,
										'last_updated' => $rows->last_updated,
										'status' => $rows->status,
										'edate' => $rows->edate
										);
			}
		}
		
		function date_compare($a, $b)
		{
			$t1 = strtotime($a['edate']);
			$t2 = strtotime($b['edate']);
			return $t1 - $t2;
		}
		usort($timelineArray, 'date_compare');
		/*echo "<pre>";
		print_r($timelineArray); die;*/
		
		return $timelineArray;
	}
	
	function date_compare($a, $b)
	{
		$t1 = strtotime($a['edate']);
		$t2 = strtotime($b['edate']);
		return $t1 - $t2;
	} 
	
	function getNotification()
    {
		$this->db->where("seen",'No');
        $this->db->where("cause_id",$this->input->post('cause_id'));
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("cause_members");
        if($query->num_rows()>0)
        {
			$data = array("seen"=>"Yes");
			$this->db->where("cause_id",$this->input->post('cause_id'));
			$this->db->update('cause_members',$data);
			
            return $query->result();
        }
        return false;
    }
	
	function disapprove_member()
    {
		$this->db->where("id",$this->input->post('member_requesrt_id'));
        $this->db->delete('cause_members');
        return true;
		
    }
	
	function approve_member()
    {
		$data = array(					
					'status'=>'Active',
					'seen'=>'Yes'
				);
				
		$this->db->where("id",$this->input->post('member_requesrt_id'));
		$this->db->update('cause_members',$data);
		return true;
    }
	
	function getUserDetailsByCauseMemberId()
	{
		$sql = "SELECT a1.id, a1.google_id, a1.twitter_id, a1.fb_id, a1.image, a1.fname, a1.lname, a1.email, a1.password, a1.recovery, a1.mobile, a1.city, a1.state, a1.country, a1.brief, a1.gender, a1.last_login, a1.status, a1.edate,a2.cause_id FROM users a1 INNER JOIN cause_members a2 ON a1.id = a2.userid WHERE a2.id = '".$this->input->post('member_requesrt_id')."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function email_approve_member($causememberid)
    {
		$data = array(					
					'status'=>'Active',
					'seen'=>'Yes'
				);
				
		$this->db->where("id",$causememberid);
		$this->db->update('cause_members',$data);
		return true;
    }
	
	function getUserDetailsByCauseMemberId1($causememberid)
	{
		$sql = "SELECT a1.id, a1.google_id, a1.twitter_id, a1.fb_id, a1.image, a1.fname, a1.lname, a1.email, a1.password, a1.recovery, a1.mobile, a1.city, a1.state, a1.country, a1.brief, a1.gender, a1.last_login, a1.status, a1.edate,a2.cause_id FROM users a1 INNER JOIN cause_members a2 ON a1.id = a2.userid WHERE a2.id = '".$causememberid."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getUserDetailsByCauseId()
	{
		$sql = "SELECT a1.fname, a1.lname, a1.email,a2.id as cause_id FROM users a1 INNER JOIN causes a2 ON a1.id = a2.userid WHERE a2.id = '".$this->input->post('cause_id')."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getUserDetailsByCommentId()
	{
		$sql = "SELECT a1.fname, a1.lname, a1.email,a2.cause_id FROM users a1 INNER JOIN cause_comments a2 ON a1.id = a2.userid WHERE a2.id = '".$this->input->post('comment_id')."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	
	function getTopNotification()
	{
		$sql = "SELECT a2.title,a1.id, a1.userid, a1.cause_id, a1.name, a1.subject, a1.type, a1.comment, a1.image, a1.seen, a1.status, a1.edate,a3.fname,a3.email FROM causes a2 INNER JOIN cause_comments a1 ON a1.cause_id = a2.id INNER JOIN users a3 ON a3.id = a1.userid WHERE a1.status = 'Active' AND a2.status = 'Active' AND a2.userid = '".$this->session->userdata('user_id')."' AND a1.userid != '".$this->session->userdata('user_id')."' ORDER BY a1.edate DESC";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getTopNotificationCount()
	{
		$sql = "SELECT a1.id FROM causes a2 INNER JOIN cause_comments a1 ON a1.cause_id = a2.id INNER JOIN users a3 ON a3.id = a1.userid WHERE a1.status = 'Active' AND a2.status = 'Active' AND a1.seen = 'No' AND a2.userid = '".$this->session->userdata('user_id')."' AND a1.userid != '".$this->session->userdata('user_id')."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getTopMemberNotification()
	{
		$sql = "SELECT a2.title,a1.id, a1.userid, a1.cause_id, a1.seen, a1.status, a1.edate,a3.fname,a3.lname,a3.email FROM causes a2 INNER JOIN cause_members a1 ON a1.cause_id = a2.id INNER JOIN users a3 ON a3.id = a1.userid WHERE  a2.status = 'Active' AND a2.userid = '".$this->session->userdata('user_id')."' AND a1.userid != '".$this->session->userdata('user_id')."' ORDER BY a1.edate DESC";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getTopMemberNotificationCount()
	{
		$sql = "SELECT a1.id FROM causes a2 INNER JOIN cause_members a1 ON a1.cause_id = a2.id INNER JOIN users a3 ON a3.id = a1.userid WHERE  a2.status = 'Active' AND a1.seen = 'No' AND a2.userid = '".$this->session->userdata('user_id')."' AND a1.userid != '".$this->session->userdata('user_id')."' ORDER BY a1.edate DESC";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function notification_update()
	{
		$sql = "UPDATE causes a2 INNER JOIN cause_comments a1 ON a1.cause_id = a2.id SET a1.seen = 'Yes' WHERE a2.userid = '".$this->session->userdata('user_id')."'";
        $query = $this->db->query($sql);
		return true;
	}
	
	function notification_update1()
	{
		$sql = "UPDATE causes a2 INNER JOIN cause_members a1 ON a1.cause_id = a2.id SET a1.seen = 'Yes' WHERE a2.userid = '".$this->session->userdata('user_id')."'";
        $query = $this->db->query($sql);
		return true;
	}
	
	
	
}
?>
