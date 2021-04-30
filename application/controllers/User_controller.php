<?php
class User_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('user_model');
                $this->load->helper('url_helper');
        }

        public function register_user_form()
        {

            $this->load->helper('form');
            
            $this->load->library('form_validation');
            $data['title'] = 'Inscrivez vous';
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|is_unique[user.pseudo]');
            $this->form_validation->set_rules('confirmMail', 'confirmation mail', 'trim|required');
            //La set_rules()méthode prend trois arguments; le nom du champ de saisie, le nom à utiliser dans les messages d'erreur et la règle. Dans ce cas, les champs de titre et de texte sont obligatoires.
            $this->form_validation->set_rules('mail', 'Mail', 'trim|required|is_unique[user.mail]|matches[confirmMail]');
            $this->form_validation->set_rules('confirmMail', 'confirmation mail', 'trim|required');
            $this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required');
            $this->form_validation->set_rules('password_user', 'Mot de passe', 'required|matches[confirmPassword]');
            $this->form_validation->set_rules('confirmPassword', 'confimation de mot de passe', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('user/register_user_form');
                $this->load->view('templates/footer');

            }
            else
            {
                $data = array(
                    'pseudo' => $this->input->post('pseudo'),
                    'mail' =>$this->input->post('mail'),
                    'birthdate' => $this->input->post('birthdate'),
                    'password_user' => password_hash($this->input->post('password_user'),PASSWORD_DEFAULT),
                );
                $this->user_model->set_user($data);
                
                //////////////////////////
                // Kevin
                //////////////////////////
                $_SESSION['alert'] = '<div class="alert alert-success">Votre compte a bien été créé</div>';

                redirect('home_controller/index', 'refresh');
                }
        }

        public function connection_user_form()
        {
            $this->load->helper('form');
            
            $this->load->library('form_validation');
            $data['title'] = 'Connectez vous';
            $this->form_validation->set_rules('mail', 'Mail', 'trim|required');
            $this->form_validation->set_rules('password_user', 'Mot de passe', 'required');
            
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('user/connection_user_form',$data);
                $this->load->view('templates/footer');

            }
            else
            {
                $data['title'] = 'Connectez vous';
                $mail =  $this->input->post('mail');
                    
            
                $m = $this->user_model->mail_exist($mail);
    
                if($m == true){
                    $password_input = $this->input->post('password_user');
                    $password_hash =  $this->user_model->get_user($mail);
                    
                if(password_verify($password_input, $password_hash[0]->password_user)) {
                    $this->session->set_userdata('id', $password_hash[0]->id);
                    $this->session->set_userdata('pseudo', $password_hash[0]->pseudo);
                    $this->session->has_userdata('pseudo');
                    $this->session->has_userdata('id');


                    redirect('home_controller/index', 'refresh');
                }

                }else{
                    ///////////////////////////////////////////////////////////////////////////
                    // KEVIN
                    ///////////////////////////////////////////////////////////////////////////

                    $_SESSION['alert'] = '<div class="alert alert-danger">Email ou mot de passe incorrect</div>';
                    redirect('user_controller/connection_user_form', 'refresh');
                    // echo'mail ou mot de passe incorrect';
                }
            }

        }
        
        
        ///////////////////////////////////////////////////////////////////////////
        // KEVIN
        ///////////////////////////////////////////////////////////////////////////

        public function view_user() {

            if (!empty($_SESSION['id'])) {

                $id = $_SESSION['id'];

                $data['user'] = $this->user_model->get_one_user($id);

                $this->load->view('templates/header');
                $this->load->view('user/account_user_view', $data);
                $this->load->view('templates/footer');

            } else {

                $data['title'] = 'Connectez vous';
                $this->load->view('templates/header', $data);
                $this->load->view('user/connection_user_form');
                $this->load->view('templates/footer');

            }    
        }
//////////////////// lau
        public  function deconnection(){
            $this->session->unset_userdata('pseudo');
            $this->session->unset_userdata('id');
            redirect('home_controller/index', 'refresh');

        }

        public function delete(){
            $id = $_SESSION['id'];
            $this->user_model->delete($id);
            $this->session->unset_userdata('pseudo');
            $this->session->unset_userdata('id');

            //////////////////////////
            // Kevin
            //////////////////////////
            $_SESSION['alert'] = '<div class="alert alert-success">Votre compte a bien été supprimé</div>';

            redirect('home_controller/index', 'refresh');

        }


        public function update_user() {

            $id = $_SESSION['id'];
            $data['user'] = $this->user_model->get_one_user($id);

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($data['user'][0]->mail == $this->input->post('mail')) {
                    
                $isUniqueMail = '';
            } else {
                $isUniqueMail = '|is_unique[user.mail]';
            }

            if ($data['user'][0]->pseudo == $this->input->post('pseudo')) {
                    
                $isUniquePseudo = '';
            } else {
                $isUniquePseudo = '|is_unique[user.pseudo]';
            }

            $this->form_validation->set_rules('pseudo', 'Pseudo', 'trim'.$isUniquePseudo);
            $this->form_validation->set_rules('mail', 'Email', 'trim'.$isUniqueMail);
            $this->form_validation->set_rules('birthdate', 'Date de naissance', 'trim');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('user/account_user_view', $data);
                $this->load->view('templates/footer');

            } else {
                
                $data = array(
                    'pseudo' => $this->input->post('pseudo'),
                    'mail' =>$this->input->post('mail'),
                    'birthdate' => $this->input->post('birthdate'),
                );

                $id = $_SESSION['id'];

                $user['user'] = $this->user_model->get_one_user($id);

                $this->user_model->update_user($data, $id);

                $this->session->set_userdata('pseudo', $this->input->post('pseudo'));
                $this->session->has_userdata('pseudo');

                redirect('user_controller/view_user', 'refresh');
            }
        }

    }