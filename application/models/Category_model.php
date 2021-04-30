<?php

class Category_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function select_all()
    {
        $query = $this->db->get('Category');
        return $query->result_array();
    }

}