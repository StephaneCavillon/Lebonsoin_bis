<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_controller extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->model('Article_model');
     }

     public function add_article(){
          
          $data['title']= '';
     }

     public function list_articles(){
          $data['title']= 'Liste des Articles';

          $data['articles'] = $this->Article_model->get_article();

          if (empty($data['articles']))
          {
               show_404();
          }

		$this->load->view('templates/header');
		$this->load->view('article/list_articles', $data);
		$this->load->view('templates/footer');

     }

     public function view_article(){
          $data['title']= '';

     }


}
