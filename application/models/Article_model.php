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

	public function get_list_articles(){

		$query = $this->db->select('*');
		$query = $this->db->from('article');
		$query = $this->db->join('photo', 'article.id = photo.id_article');
		$query = $this->db->join('user', 'article.id_user = user.id');
		$query = $this->db->join('category', 'article.id_category = category.id');

		$query = $this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result(); // retourne un objet
	}

	public function get_article($id){

		$query = $this->db->select('*');
		$query = $this->db->from('article');
		$query = $this->db->join('photo', 'article.id = photo.id_article');
		$query = $this->db->join('user', 'article.id_user = user.id');
		$query = $this->db->join('category', 'article.id_category = category.id');
		$query = $this->db->where('article.id', $id);
		$query = $this->db->get();
		return $query->result(); 
	}

	public function get_list_articles_by_user($pseudo_user){
		$query = $this->db->select('*');
		$query = $this->db->from('article');
		$query = $this->db->join('photo', 'article.id = photo.id_article');
		$query = $this->db->join('user', 'article.id_user = user.id');
		$query = $this->db->join('category', 'article.id_category = category.id');
		$query = $this->db->where('user.pseudo', $pseudo_user);
		$query = $this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result(); // retourne un objet

	}

	public function delete(){
		
	}
}