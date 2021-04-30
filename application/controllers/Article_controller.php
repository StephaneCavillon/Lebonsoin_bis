<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_controller extends CI_Controller {

     public function __construct()
     {
               parent::__construct();
               $this->load->model('Article_model');
               $this->load->model('Category_model');

          }

     public function add_article(){
          
          if(empty($_SESSION['id'])){

               redirect("user_controller/connection_user_form");

          }else{

               $id_vendeur = $_SESSION['id'];
               if( $this->form_validation->run() == FALSE ) // Formulaire invalide
               { 
                    var_dump('error form');
                    var_dump($_POST);
                    $data['categorys'] = $this->Category_model->select_all();
                    $data['idVendeur'] = $id_vendeur;
     
                    $data["title"] = "Déposer une annonce";
                    $this->load->view('templates/header', $data);
                    $this->load->view('article/add_article_form', $data);
                    $this->load->view('templates/footer', $data);
               } 
               else // Le formulaire est valide
               { 
                    var_dump('else');
                    // Enregistrement de l'image
                    $config['upload_path']          = './assets/uppload';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['file_name']        = time();

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('url_image')) //Erreur dans l'enregistrement 
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
                         var_dump('pas erreur');
                         $dataPhoto = array(

                              'url_image' => $this->upload->data('file_name'),
                              'id_article' => $this->input->post('id_Mark'),

                         );
                         $this->Photo_model->insert($dataPhoto);

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
     public function delete($id){
     
          $this->Article_model->delete($id);
          $_SESSION['alert']= '<div class=" alert alert-success">Votre annonce a bien était supprimée</div>';
          redirect('user_controller/view_user', 'refresh');
     }


}
