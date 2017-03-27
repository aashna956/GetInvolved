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

	function addPost()
	{
		$this->db->where("category",$this->input->post('cat'));
		$query=$this->db->get("forum_categories");
		$category=$query->result();

		$data = array(
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post('content'),
				'cat_id'=>$category[0]->cat_id,
				'user_id'=>$this -> session -> userdata('user_id')
			);
		$this->db->insert('posts',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{
			return true;
		}
		return false;
	}

	function getPost($post_id)
	{
		// need to do some inner joins here
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where("post_id", $post_id);

		$this->db->join('forum_categories', 'forum_categories.cat_id = posts.cat_id');
		$this->db->join('users', 'users.id = posts.user_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result[0];
	}

	function getComments($post_id) {
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where("post_id", $post_id);
		$this->db->join('users', 'users.id = comments.user_id');
		$query = $this->db->get();
		return $query->result();
	}

	function addComment()
	{
		$data = array(
				'comment'=>$this->input->post('comment'),
				'post_id'=>$this->input->post('post_id'),
				'user_id'=>$this -> session -> userdata('user_id')
			);
		$this->db->insert('comments',$data);
		$insertId = $this->db->insert_id();
		if(!empty($insertId) && $insertId!='0')
		{
			return true;
		}
		return false;		
	}
}
?>
