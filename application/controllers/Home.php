<?php 
    class Home extends CI_Controller{

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
        public function index(){
            if($this->session->has_userdata('logged_user')){
                redirect('home/home');
            } else {
                $perpage = 5;
                $config = [
                    'base_url'          => base_url()."home/index",
                    'total_rows'        => $this->recipe_model->getPostRows(),
                    'per_page'          => $perpage,
                    
                    'full_tag_open'     => '<nav aria-label="Page navigation example"><ul class="pagination">',
                    'full_tag_close'    => '</ul></nav>',

                    'first_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'first_tag_close'    => '</div></li>',

                    'last_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'last_tag_close'    => '</div></li>',

                    'next_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'next_tag_close'    => '</div></li>',

                    'prev_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'prev_tag_close'    => '</div></li>',

                    'cur_tag_open'    => '<li class="page-item active"><a class="page-link" href="#user-avatar">',
                    'cur_tag_close'    => '</a></li>',

                    'num_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'num_tag_close'    => '</div></li>'
                ];
                $this->pagination->initialize($config);
                $recipeInfoArr = [];
                $userInfoArr = [];
                $data['posts'] = $this->recipe_model->getLimitedPostedRecipes($perpage, $this->uri->segment(3));
                foreach ($data['posts'] as $info){
                    array_push($recipeInfoArr, $this->recipe_model->getRecipeOne($info->recipe_id));
                    array_push($userInfoArr, $this->user_model->getUserInfo($info->user_id));
                }
                $data['recipes'] = $recipeInfoArr;
                $data['users'] = $userInfoArr;
                $data['links'] = $this->pagination->create_links();
                $data['title'] = "Recipe";
                $this->load->view('RecipeIdeas/includes/header', $data);
                $this->load->view('RecipeIdeas/Home/index');
                $this->load->view('RecipeIdeas/includes/footer');
            }
        }
        public function home(){
            if($this->session->has_userdata('logged_user')){
                $perpage = 5;
                $config = [
                    'base_url'          => base_url()."home/home",
                    'total_rows'        => $this->recipe_model->getPostRows(),
                    'per_page'          => $perpage,
                    
                    'full_tag_open'     => '<nav aria-label="Page navigation example"><ul class="pagination">',
                    'full_tag_close'    => '</ul></nav>',

                    'first_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'first_tag_close'    => '</div></li>',

                    'last_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'last_tag_close'    => '</div></li>',

                    'next_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'next_tag_close'    => '</div></li>',

                    'prev_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'prev_tag_close'    => '</div></li>',

                    'cur_tag_open'    => '<li class="page-item active"><a class="page-link" href="#user-avatar">',
                    'cur_tag_close'    => '</a></li>',

                    'num_tag_open'    => '<li class="page-item"><div class="page-link">',
                    'num_tag_close'    => '</div></li>'
                ];
                $this->pagination->initialize($config);
                $recipeInfoArr = [];
                $userInfoArr = [];
                $data['posts'] = $this->recipe_model->getLimitedPostedRecipes($perpage, $this->uri->segment(3));
                foreach ($data['posts'] as $info){
                    array_push($recipeInfoArr, $this->recipe_model->getRecipeOne($info->recipe_id));
                    array_push($userInfoArr, $this->user_model->getUserInfo($info->user_id));
                }
                $data['recipes'] = $recipeInfoArr;
                $data['users'] = $userInfoArr;
                $data['links'] = $this->pagination->create_links();
                $data['title'] = "Recipe";
                $this->load->view('RecipeIdeas/includes/header', $data);
                $this->load->view('RecipeIdeas/Home/home');
                $this->load->view('RecipeIdeas/includes/footer');
            } else {
                redirect('home/index');
            }
        }
        public function viewDetailsPostHomeView(){
            if($this->session->has_userdata('logged_user')){
                $recipeInfoArr = [];
                $userInfoArr = [];
                $recipeInfoArrIngredients = [];
                $recipeInfoArrStep = [];
                $data['posts'] = $this->recipe_model->getOnePostedRecipe($this->uri->segment(3));
                foreach ($data['posts'] as $info){
                    array_push($recipeInfoArr, $this->recipe_model->getRecipeOne($info->recipe_id));
                    array_push($userInfoArr, $this->user_model->getUserInfo($info->user_id));
                    array_push($recipeInfoArrIngredients, $this->recipe_model->getRecipeIngredients($info->recipe_id));
                    array_push($recipeInfoArrStep, $this->recipe_model->getRecipeSteps($info->recipe_id));
                }
                $data['recipes'] = $recipeInfoArr;
                $data['users'] = $userInfoArr;
                $data['ingredients'] = $recipeInfoArrIngredients;
                $data['steps'] = $recipeInfoArrStep;
                $data['title'] = 'Recipe Details';
                $this->load->view('RecipeIdeas/includes/header', $data);
                $this->load->view('RecipeIdeas/Home/viewDetailsPostHome');
                $this->load->view('RecipeIdeas/includes/footer');
            } else {
                redirect('home/index');
            }
        }
        public function viewDetailsPostIndexView(){
            if($this->session->has_userdata('logged_user')){
                redirect('home/home');
            } else {
                $recipeInfoArr = [];
                $userInfoArr = [];
                $recipeInfoArrIngredients = [];
                $recipeInfoArrStep = [];
                $data['posts'] = $this->recipe_model->getOnePostedRecipe($this->uri->segment(3));
                foreach ($data['posts'] as $info){
                    array_push($recipeInfoArr, $this->recipe_model->getRecipeOne($info->recipe_id));
                    array_push($userInfoArr, $this->user_model->getUserInfo($info->user_id));
                    array_push($recipeInfoArrIngredients, $this->recipe_model->getRecipeIngredients($info->recipe_id));
                    array_push($recipeInfoArrStep, $this->recipe_model->getRecipeSteps($info->recipe_id));
                }
                $data['recipes'] = $recipeInfoArr;
                $data['users'] = $userInfoArr;
                $data['ingredients'] = $recipeInfoArrIngredients;
                $data['steps'] = $recipeInfoArrStep;
                $data['title'] = 'Recipe Details';
                $this->load->view('RecipeIdeas/includes/header', $data);
                $this->load->view('RecipeIdeas/Home/viewDetailsPostIndex');
                $this->load->view('RecipeIdeas/includes/footer');
            }
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */


        // LOGICS
    }
?>