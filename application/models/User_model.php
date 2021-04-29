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
        $this->db->select('pseudo, password_user');
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

    public function get_one_user($pseudo) {

        $query = $this->db->get_where('user', array('pseudo' => $pseudo));
        return $query->result();
    }
}
