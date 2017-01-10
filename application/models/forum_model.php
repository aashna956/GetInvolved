<?php
class Forum_model extends CI_Model {
    public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }
	function getForumCategories()
	{
		$query=$this->db->get("forum_categories");
		return $query->result();
	}
	/* Posts for each category */
	function getPosts($cat_id)
	{
		$this->db->where("cat_id",$cat_id);
		$this->db->order_by("datetime","DESC");
		$query=$this->db->get("posts");
		return $query->result();
	}


}
?>