<?php
class Article_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}

	public function get_rand_articles() {

		$query = $this->db->select('article.id AS id_article, 
									photo.id AS id_photo,
									title, 
									description_art, 
									price,
									created_at, 
									zipcode, 
									city, 
									phone,
									name_img');
		$query = $this->db->from('article');
		$query = $this->db->join('photo', 'article.id = photo.id_article');
		$query = $this->db->order_by('id', 'RANDOM');
		$query = $this->db->limit(4);
		$query = $this->db->get();
		return $query->result();

	}
}