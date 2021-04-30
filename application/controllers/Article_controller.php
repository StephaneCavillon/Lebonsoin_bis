<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_controller extends CI_Controller {

     public function __construct()
     {
               parent::__construct();
               $this->load->model('Article_model');
               $this->load->model('Category_model');
               $this->load->model('Photo_model');


          }

     public function add_article(){
          
          if(empty($_SESSION['id'])){

               redirect("user_controller/connection_user_form");

          }else{

               $id_vendeur = $_SESSION['id'];
               if( $this->form_validation->run() == FALSE ) // Formulaire invalide
               { 
                    $data['categorys'] = $this->Category_model->select_all();
                    $data['idVendeur'] = $id_vendeur;
     
                    $data["title"] = "Déposer une annonce";
                    $this->load->view('templates/header', $data);
                    $this->load->view('article/add_article_form', $data);
                    $this->load->view('templates/footer', $data);
               } 
               else // Le formulaire est valide
               { 
                    // Enregistrement de l'image
                    $config['upload_path']          = './assets/upload';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['file_name']        = time();

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('name_img')) //Erreur dans l'enregistrement 
                    {
                         $data['erreur'] = 'erreur dans l\'importation de l\'image';

                         $data['categorys'] = $this->Category_model->select_all();
                         $data['idVendeur'] = $id_vendeur;
          
                         $data["title"] = "Déposer une annonce";
                         $this->load->view('templates/header', $data);
                         $this->load->view('article/add_article_form', $data);
                         $this->load->view('templates/footer', $data);

                    } else // pas d'erreur
                    {

                         $data = array( 
                              'title' => $this->input->post('title'),
                              'description_art' => $this->input->post('description_art'),
                              'price' => $this->input->post('price'),
                              'created_at' => date('Y-m-d H:i:s'),
                              'zipcode' => $this->input->post('zipcode'),
                              'city' => $this->input->post('city'),
                              'phone' => $this->input->post('phone'),
                              'id_user' => $id_vendeur,
                              'id_category' => $this->input->post('id_category'),
                         ); 
                         
                         $this->Article_model->insert($data);

                         $dataPhoto = array(

                              'name_img' => $this->upload->data('file_name'),
                              'id_article' => $this->db->insert_id(),

                         );
                         $this->Photo_model->insert($dataPhoto);

                         $_SESSION['alert'] = '<div class="alert alert-success">Votre annonce a bien été publiée</div>';

                         redirect("user_controller/view_user/");
                    }

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
          $data['title']=$data['article'][0]->title;

          $this->load->view('templates/header');
               $this->load->view('article/article', $data);
               $this->load->view('templates/footer');
     }

     public function list_articles_by_user($pseudo_user){
          
          $data['articles'] = $this->Article_model->get_list_articles_by_user($pseudo_user);
          
          $data['title']= 'Liste des Articles de '.$data['articles'][0]->pseudo;
     
          if (empty($data['articles']))
          {
               show_404();
          }

          $this->load->view('templates/header');
          $this->load->view('article/list_articles', $data);
          $this->load->view('templates/footer');

     }
     public function delete($id = null){

          if(!isset($_SESSION['id'])){
               redirect('home_controller/index', 'refresh');
          }else{
     
               $this->Article_model->delete($id);
               $_SESSION['alert']= '<div class=" alert alert-success">Votre annonce a bien était supprimée</div>';
               redirect('user_controller/view_user', 'refresh');
          }
     }


}
