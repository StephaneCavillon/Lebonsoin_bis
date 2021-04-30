<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_controller extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->model('Article_model');
     }

     public function add_article(){
          
          if(empty($_SESSION['id'])){

               redirect("user_controller/connection_user_form");

          }else{

               $id_vendeur = $_SESSION['id'];
               if( $this->form_validation->run() == FALSE ) // Formulaire invalide
               { 
                    $this->load->model('Category_model');
                    $data['categorys'] = $this->Category_model->select_all();
                    $data['idVendeur'] = $id_vendeur;
     
                    $data["title"] = "Déposer une annonce";
                    $this->load->view('templates/header', $data);
                    $this->load->view('article/add_article_form', $data);
                    $this->load->view('templates/footer', $data);
               } 
               else // Le formulaire est valide
               { 
                    $data = array( 
                         'title' => $this->input->post('title'),
                         'description_art' => $this->input->post('description_art'),
                         'price' => $this->input->post('price'),
                         'created_at' => '',
                         'zipcode' => $this->input->post('zipcode'),
                         'city' => $this->input->post('city'),
                         'phone' => $this->input->post('phone'),
                         'id_user' => $id_vendeur,
                         'id_category' => $this->input->post('category'),
                    ); 
                    $this->Article_model->insert($data);
                    redirect("user_controller/view_user/");
               } 

          }

     }

     public function list_articles(){
          $data['title']= 'Liste des Articles';

          $data['articles'] = $this->Article_model->get_list_articles();

          if (empty($data['articles']))
          {
               show_404();
          }

		$this->load->view('templates/header');
		$this->load->view('article/list_articles', $data);
		$this->load->view('templates/footer');

     }

     public function view_article($id = NULL){
          
          $data['article'] = $this->Article_model->get_article($id);

          if (empty($data['article']))
          {
               show_404();
          }
          var_dump($data['article']);
          // $data['title']=$data['article']->$title;

          $this->load->view('templates/header');
		$this->load->view('article/article', $data);
		$this->load->view('templates/footer');



     }


}
