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
                $this->load->view('templates/header', $data);
                $this->load->view('user/success');
                $this->load->view('templates/footer');
            }
        }
        
        ///////////////////////////////////////////////////////////////////////////
        // KEVIN
        ///////////////////////////////////////////////////////////////////////////

        public function view_user($id) {

            $data['user'] = $this->user_model->get_one_user($id);

            $this->load->view('templates/header');
            $this->load->view('user/account_user_view', $data);
            $this->load->view('templates/footer');
        }




    }