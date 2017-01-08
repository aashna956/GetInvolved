<?php
class Administrator_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	function login_process($username,$password)
    {
		$this->db->where("status",'Active');
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        $query=$this->db->get("administrator");
        if($query->num_rows()>0)
        {
			$current_time = date('Y-m-d H:i:s');
			$data = array('last_login'=>$current_time);
			$this->db->where("username",$username);
			$this->db->update('administrator',$data);
            foreach($query->result() as $rows)
            {
                //add all data to session
                $newdata = array(
                    'admin_id'  => $rows->id,
                    'admin_fname'  => $rows->fname,
                    'admin_lname'  => $rows->lname,
                    'admin_username'    => $rows->username,
					'logged_in'  => TRUE
                );
            }
            $this->session->set_userdata($newdata);
            return true;
        }
        return false;
    }
	
	function slide_process($fileArray)
	{
		$f_array = explode(',',$fileArray);
		
		foreach($f_array as $f_data)
		{
			if(!empty($f_data))
			{
				$data = array(
					'title'=>$this->input->post('title'),
					'slide'=>$f_data
				);
				
				$this->db->insert('sliders',$data);
			}
		}
		return 1;
		
	}
	
	function getSlideListing()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("sliders");
		return $query->result();
	}
	
	function getTotalUsers()
	{
		$query=$this->db->get("users");
		//return $query->result();
		return $query->num_rows();
	}
	
	function getActiveTotalUsers()
	{
		$this->db->where("status",'Active');
		$query=$this->db->get("users");
		return $query->num_rows();
	}
	
	
	function getTotalCauses()
	{
		$query=$this->db->get("causes");
		//return $query->result();
		return $query->num_rows();
	}
	
	function getActiveTotalCauses()
	{
		$this->db->where("status",'Active');
		$query=$this->db->get("causes");
		return $query->num_rows();
	}
		
	function slider_remove($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('sliders');
		return true;
	}
	
	function getPageListing()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("pages");
		return $query->result();
	}
	
	function getPageContent($id)
	{
		$this->db->order_by("edate","DESC");
		$this->db->where('id',$id);
        $query=$this->db->get("pages");
		return $query->result();
	}
	
	function page_process()
	{
		$data = array(
					'title'=>$this->input->post('title'),
					'content'=>$this->input->post('content')
				);
				
		$this->db->insert('pages',$data);
		return 1;
	}
	
	
	function page_modify_process()
	{
		$data = array(
					'title'=>$this->input->post('title'),
					'content'=>$this->input->post('content')
				);
				
		$this->db->where("id",$this->input->post('pid'));
		$this->db->update('pages',$data);
		return 1;
	}
	
	function submit_order()
	{
		$data = array(
					'sort_order'=>$this->input->post('sort_order')
				);
				
		$this->db->where("id",$this->input->post('cause_id'));
		$this->db->update('causes',$data);
		return true;
	}
	
	
	function getCategoryListing()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("categories");
		return $query->result();
	}
	function categories_process()
	{
		$data = array(
					'title'=>$this->input->post('title'),
				);
				
		$this->db->insert('categories',$data);
		return 1;
	}
	function getCategoryContent($id)
	{
		$this->db->order_by("edate","DESC");
		$this->db->where('id',$id);
        $query=$this->db->get("categories");
		return $query->result();
	}
	function categories_modify_process()
	{
		$data = array(
					'title'=>$this->input->post('title'),
				);
		$this->db->where("id",$this->input->post('pid'));
		$this->db->update('categories',$data);
		return 1;
	}
	function category_option($id,$option)
	{
		$data = array(
					'status'=>$option
				);
				
		$this->db->where("id",$id);
		$this->db->update('categories',$data);
		return 1;
	}
	
	
	function getUserListing()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("users");
		return $query->result();
	}
	
	
	function users_option($id,$option)
	{
		$data = array(
					'status'=>$option
				);
				
		$this->db->where("id",$id);
		$this->db->update('users',$data);
		return 1;
	}
	
	function getUserCauses()
	{
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("causes");
		return $query->result();
	}
	
	function getUserCausesById($id)
	{
		$this->db->where("userid",$id);
		$this->db->order_by("edate","DESC");
        $query=$this->db->get("causes");
		return $query->result();
	}
	
	function getCausesById($id)
	{

		$this->db->where("id",$id);
        $query=$this->db->get("causes");
		return $query->result();
	}
	
	function cause_option($id,$option)
	{
		$data = array(
					'status'=>$option
				);
				
		$this->db->where("id",$id);
		$this->db->update('causes',$data);
		return 1;
	}
	
	function cause_delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('causes',$data);
		
		return 1;
	}
	
	function getAbusive()
	{
		
		$sql = "SELECT a2.*,count(a1.comment_id) as total FROM reportive a1 INNER JOIN cause_comments a2 ON a1.comment_id = a2.id GROUP BY a1.comment_id";
        $query = $this->db->query($sql);
		if($query->num_rows()>0)
        {
			return $query->result();
		}
		return false;
	}
	
	function abusive_option($id)
	{
		$this->db->where("id",$id);
		$this->db->delete('cause_comments',$data);
		return 1;
	}
	
	function getUserDetailsByCauseId($id)
	{
		$sql = "SELECT a1.id, a1.google_id, a1.twitter_id, a1.fb_id, a1.image, a1.fname, a1.lname, a1.email, a1.password, a1.recovery, a1.mobile, a1.city, a1.state, a1.country, a1.brief, a1.gender, a1.last_login, a1.status, a1.edate FROM users a1 INNER JOIN causes a2 ON a1.id = a2.userid WHERE a2.id = '".$id."'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function view_cause_update()
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
					'categories'=>$cat
				);
		$this->db->where("id",$this->input->post('pid'));
		$this->db->update('causes',$data);
		return true;
	}
	
}
?>
