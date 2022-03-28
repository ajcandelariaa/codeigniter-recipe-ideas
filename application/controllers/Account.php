<?php 
    class Account extends CI_Controller{

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
        public function loginView(){
            if($this->session->has_userdata('logged_user')){
                redirect('home/home');
            } else {
                $data = [
                    'title' => 'Login'
                ];
                $this->load->view('RecipeIdeas/includes/header', $data);
                $this->load->view('RecipeIdeas/Account/login');
                $this->load->view('RecipeIdeas/includes/footer');
            }
        }
        public function accountDetailsView(){
            if($this->session->has_userdata('logged_user')){
                $result = $this->user_model->getUserInfo($this->session->userdata('logged_user'));
                $recipes = $this->recipe_model->getRecipeRows($this->session->userdata('logged_user'));
                $postedRecipes = $this->recipe_model->getPostedRecipesRows($this->session->userdata('logged_user'));
                $config = [
                    'title'  => 'Account Details',
                    'result' => $result,
                    'recipes' => $recipes,
                    'postedRecipes' => $postedRecipes
                ];
                $this->load->view('RecipeIdeas/includes/header', $config);
                $this->load->view('RecipeIdeas/Account/accountDetails');
                $this->load->view('RecipeIdeas/includes/footer');

            } else {
                redirect('home/index');
            }
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */
        // LOGICS
        public function logout(){
            $this->session->unset_userdata('logged_user');
            redirect('home/index');
        }
        public function loginUser(){
            $this->form_validation->set_rules('login_username', 'Username', 'required');
            $this->form_validation->set_rules('login_password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->loginView();
            } else {
                $result = $this->user_model->getLogin($this->input->post('login_username'), $this->input->post('login_password'));
                $id = $result[0]->user_id;
                if($result == 0){
                    $this->session->set_userdata('login', 'failed');
                    redirect('account/loginView');
                } else {
                    $this->session->set_userdata('logged_user', $id);
                    redirect('home/home');
                }
            }
        }
        public function resetPassword(){
            $this->form_validation->set_rules('curr-password', 'Current Passowrd', 'required|callback_passwordCheck');
            $this->form_validation->set_rules('new-password', 'Enter New Password', 'required');
            $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[new-password]');
            if ($this->form_validation->run() == FALSE){
                $this->accountDetailsView();
            } else {
                $this->user_model->updateUserInfo($this->session->userdata('logged_user'), [
                    'user_password' => $this->input->post('new-password', true)
                ]);
                $this->session->set_userdata('resetPassword', 'success');
                redirect("account/accountDetailsView#resetPassword");
            }
        }
        public function passwordCheck($str){
            $result = $this->user_model->getUserInfo($this->session->userdata('logged_user'));
            if($str == $result[0]->user_password){
                return TRUE;
            } else {
                $this->form_validation->set_message('passwordCheck', 'Current password is not the same with the old password');
                return FALSE;
            }
        }
    }
    
?>