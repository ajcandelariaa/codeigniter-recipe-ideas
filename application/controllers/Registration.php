<?php 
    class Registration extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('user_model', null, TRUE);
            $this->load->model('recipe_model', null, TRUE);
        }

        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */

        // VIEWS
        public function registerView($error=""){
            if($this->session->has_userdata('logged_user')){
                redirect('home/home');
            } else {
                $data = [
                    'title' => 'Registration',
                    'error' => $error
                ];
                $this->load->view('RecipeIdeas/includes/header', $data);
                $this->load->view('RecipeIdeas/Registration/register');
                $this->load->view('RecipeIdeas/includes/footer');
            }
        }

        public function emailVerificationView(){
            $data = [
                'title' => 'Email Verification'
            ];
            $this->load->view('RecipeIdeas/includes/header', $data);
            $this->load->view('RecipeIdeas/Registration/emailVerification');
            $this->load->view('RecipeIdeas/includes/footer');
        }


        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */


        // LOGICS
        public function registerUser(){
            $config = [
                'upload_path'   => './uploads/Users/',
                'allowed_types' => 'gif|jpg|png|jpeg'
            ];
            $this->upload->initialize($config);
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.user_username]|alpha_numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            if (empty($_FILES['userfile']['name'])){
                $this->form_validation->set_rules('userfile', 'Choose your Image', 'required');
            }
            if ($this->form_validation->run() == FALSE){
                $this->registerView();
            } else {
                if (!$this->upload->do_upload('userfile')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->registerView($error);
                } else {
                    $tempId = $this->user_model->getNextUserId();
                    if($tempId == NULL){
                        $nextId = 1;
                    } else {
                        $nextId = ($tempId[0]->user_id) + 1;
                    }
                    $this->load->library('email');
                    $config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '7';
                    $config['smtp_user']    = 'recipeideas18@gmail.com';
                    $config['smtp_pass']    = 'Ci_finalproject';
                    $config['charset']    = 'utf-8';
                    $config['newline']    = "\r\n";
                    $config['mailtype'] = 'html'; 
                    $config['validation'] = TRUE; 
                    $this->email->initialize($config);
                    $code = substr(md5(uniqid(rand(), true)), 16, 16);
                    $htmlContent = '<h1>Email Verification</h1>';
                    $htmlContent .= '<p>You need to verify your email to be able to post your Recipe</p>';
                    $htmlContent .= '<a href="'.base_url().'registration/emailVerificationView/'.$nextId.'/'.$code.'">Click here to verify your email</a>';
                    $htmlContent .= '<p>This is your verfication code: <strong>'.$code.'</strong></p>';
                    $this->email->from('recipeideas18@gmail.com', 'Recipe Ideas');
                    $this->email->to($this->input->post('email', true));
                    $this->email->subject('Email Verification');
                    $this->email->message($htmlContent);
                
                    if( $this->email->send()){
                        $imageName = $this->upload->data('file_name');
                        $this->user_model->insertUser([
                            'user_fullname'     => $this->input->post('fullname', true),
                            'user_email'        => $this->input->post('email', true),
                            'user_username'     => $this->input->post('username', true),
                            'user_password'     => $this->input->post('password', true),
                            'user_image_name'   => $imageName,
                            'user_verified'     => "No"
                        ]);
                        $this->session->set_userdata('register', 'success');
                        redirect("registration/registerView");
                    } else {
                        redirect("registration/registerView");
                    }
                }
            }
        }
        public function emailVerification(){
            $userId = $this->uri->segment(3);
            $verificationCode = $this->uri->segment(4);
            $tempChecker = $this->user_model->getVerificationStatus($userId);
            $checkIfVerifiedAlready = $tempChecker[0]->user_verified;
            if($checkIfVerifiedAlready == "Yes"){
                $this->session->set_userdata('verified', 'existing');
                redirect('registration/emailVerificationView/'.$userId.'/'.$verificationCode);
            } else {
                $this->form_validation->set_rules('verificationCode', 'Verification Code', 'required');
                if ($this->form_validation->run() == FALSE){
                    $this->emailVerificationView();
                } else {
                    if($this->input->post('verificationCode', true) == $verificationCode){
                        $this->user_model->updateUserInfo($userId, [
                            'user_verified' => "Yes"
                        ]);
                        $this->session->set_userdata('verified', 'valid');
                        redirect('registration/emailVerificationView/'.$userId.'/'.$verificationCode);
                    } else {
                        $this->session->set_userdata('verified', 'invalid');
                        redirect('registration/emailVerificationView/'.$userId.'/'.$verificationCode);
                    }
                }
            }
        }
    }
?>