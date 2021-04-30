<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function get_all_users()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function get_user($mail)
    {
        $this->db->select('id, pseudo, password_user');
        $this->db->where( 'mail' ,$mail);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function mail_exist($mail)
    {
        $this->db->where( 'mail' ,$mail);
        $query = $this->db->get('user');
        return $query->result();


    }

    public function set_user($data)
    {
        $this->load->helper('url');

        return $this->db->insert('user', $data);
    }

///////////////////////////////////////////////////////////////////////////////////////
// KEVIN
///////////////////////////////////////////////////////////////////////////////////////

    public function get_one_user($id) {

        
		$query = $this->db->select('article.id AS id_article, 
                                    photo.id AS id_photo,
                                    user.id AS id_user,
                                    user.mail,
                                    user.pseudo,
                                    birthdate,
                                    name_cat,
                                    title, 
                                    description_art, 
                                    price,
                                    created_at, 
                                    zipcode, 
                                    city, 
                                    phone,
                                    name_img');
		$query = $this->db->from('user');
        $query = $this->db->join('article', 'article.id_user = user.id','left');
		$query = $this->db->join('photo', 'article.id = photo.id_article','left');
		
		$query = $this->db->join('category', 'article.id_category = category.id','left');
		$query = $this->db->where('user.id', $id);
		$query = $this->db->get();
        return $query->result();
    }

    public function update_user($data, $id) {

        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function delete($id){
        return $this->db->delete('user', array('id' => $id));
    }
}
