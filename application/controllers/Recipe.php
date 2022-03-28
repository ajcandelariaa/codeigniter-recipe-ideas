<?php 
    class Recipe extends CI_Controller{
        
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
        public function myRecipeView(){
            if($this->session->has_userdata('logged_user')){
                $config = [];
                $recipeIds = $this->recipe_model->getRecipeInfo($this->session->userdata('logged_user'));
                foreach ($recipeIds as $recipeId){
                    $recipeStepArr = [];
                    $recipeIngArr = [];
                    $recipeIngredients = $this->recipe_model->getRecipeIngredients($recipeId->recipe_id);
                    if($recipeIngredients != ""){
                        foreach ($recipeIngredients as $recipeIngredient){
                            array_push($recipeIngArr, $recipeIngredient);
                        }
                    } else { array_push($recipeIngArr, "none"); }

                    $recipeSteps = $this->recipe_model->getRecipeSteps($recipeId->recipe_id);
                    if($recipeSteps != ""){
                        foreach ($recipeSteps as $recipeStep){
                            array_push($recipeStepArr, $recipeStep);
                        }
                    } else { array_push($recipeStepArr, "none"); }
                    array_push($config, array(array($recipeId), array($recipeIngArr), array($recipeStepArr)));
                }
                $data = [
                    'title' => 'My Recipe',
                    'config' => $config
                ];
                $this->load->view('RecipeIdeas/includes/header',$data);
                $this->load->view('RecipeIdeas/Recipe/myRecipe');
                $this->load->view('RecipeIdeas/includes/footer');
            } else {
                redirect('home/index');
            }
        }
        public function addRecipeView($error=""){
            if($this->session->has_userdata('logged_user')){
                $data = [
                    'title' => 'Create Recipe',
                    'error' => $error
                ];
                $this->load->view('RecipeIdeas/includes/header',$data);
                $this->load->view('RecipeIdeas/Recipe/addRecipe');
                $this->load->view('RecipeIdeas/includes/footer');
            } else {
                redirect('home/index');
            }
        }
        public function editRecipeView(){
            if($this->session->has_userdata('logged_user')){
                $config = [];
                $recipe = $this->recipe_model->getRecipeOne($this->uri->segment(3));
                $recipeIngredients = $this->recipe_model->getRecipeIngredients($this->uri->segment(3));
                $recipeSteps = $this->recipe_model->getRecipeSteps($this->uri->segment(3));
    
                $recipeStepArr = [];
                $recipeIngArr = [];
                if($recipeIngredients != ""){
                    foreach ($recipeIngredients as $recipeIngredient){
                        array_push($recipeIngArr, $recipeIngredient);
                    }
                } else { array_push($recipeIngArr, "none"); }
                
                if($recipeSteps != ""){
                    foreach ($recipeSteps as $recipeStep){
                        array_push($recipeStepArr, $recipeStep);
                    }
                } else { array_push($recipeStepArr, "none"); }
    
                array_push($config, $recipe, $recipeIngArr, $recipeStepArr);
    
                $data = [
                    'title'  => 'Edit Recipe',
                    'config' => $config
                ];
                $this->load->view('RecipeIdeas/includes/header',$data);
                $this->load->view('RecipeIdeas/Recipe/editRecipe');
                $this->load->view('RecipeIdeas/includes/footer');
            } else {
                redirect('home/index');
            }
        }
        public function postedRecipeView(){
            if($this->session->has_userdata('logged_user')){
                $recipeInfoArr = [];
                $data['posts'] = $this->recipe_model->getAllPostedRecipes($this->session->userdata('logged_user'));
                foreach ($data['posts'] as $info){
                    array_push($recipeInfoArr, $this->recipe_model->getRecipeOne($info->recipe_id));
                }
                $data['recipes'] = $recipeInfoArr;
                $data['title'] = "Posted Recipes";
                $this->load->view('RecipeIdeas/includes/header',$data);
                $this->load->view('RecipeIdeas/Recipe/postedRecipe');
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
        public function addRecipeDatabase(){
            $config = [
                'upload_path'   => './uploads/Foods/',
                'allowed_types' => 'gif|jpg|png|jpeg'
            ];
            $this->upload->initialize($config);
            $this->form_validation->set_rules('recipe-name', 'Recipe Name', 'required');
            $this->form_validation->set_rules('recipe-description', 'Recipe Description', 'required');
            $this->form_validation->set_rules('recipe-prep-time', 'Preperation Time', 'required');
            $this->form_validation->set_rules('recipe-cook-time', 'Cook Time', 'required');
            $this->form_validation->set_rules('recipe-servings', 'Servings', 'required');
            if($this->input->post('recipe-category') == ""){
                $this->form_validation->set_rules('recipe-category', 'Recipe Category', 'required');
            }
            if (empty($_FILES['userfile']['name'])){
                $this->form_validation->set_rules('userfile', 'Recipe Image', 'required');
            }
            
            if ($this->form_validation->run() == FALSE){
                $this->addRecipeView();
            } else {
                if (!$this->upload->do_upload('userfile')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->addRecipeView($error);
                } else {
                    $imageName = $this->upload->data('file_name');
                    $this->recipe_model->insertRecipe([
                        'user_id'               => $this->session->userdata('logged_user'),
                        'recipe_name'           => $this->input->post('recipe-name', true),
                        'recipe_description'    => $this->input->post('recipe-description', true),
                        'recipe_prep_time'    => $this->input->post('recipe-prep-time', true),
                        'recipe_cook_time'    => $this->input->post('recipe-cook-time', true),
                        'recipe_servings'    => $this->input->post('recipe-servings', true),
                        'recipe_category'       => $this->input->post('recipe-category', true),
                        'recipe_image'          => $imageName,
                        'recipe_posted'          => "No"
                    ]);
                    $getLatestRecipeId = $this->recipe_model->getLatestRecipeId($this->session->userdata('logged_user'));
                    $recipeIngredeints = $this->input->post('ingredient', true);
                    foreach($recipeIngredeints as $recipeIngredeint){
                        $this->recipe_model->insertIngredient([
                            'recipe_id'                 => $getLatestRecipeId[0]->recipe_id,
                            'recipe_ingredient_text'    => $recipeIngredeint
                        ]);
                    }
                    $recipeSteps = $this->input->post('step', true);
                    foreach($recipeSteps as $recipeStep){
                        $this->recipe_model->insertStep([
                            'recipe_id'           => $getLatestRecipeId[0]->recipe_id,
                            'recipe_step_text'    => $recipeStep
                        ]);
                    }
                    $this->session->set_userdata('addRecipe', 'success');
                    redirect("recipe/addRecipeView");
                }
            }
        }
        public function deleteRecipe(){
            $this->recipe_model->deleteRecipe($this->uri->segment(3));
            $this->session->set_userdata('share_status', 'deleted');
            redirect("recipe/myRecipeView");
        }
        public function removeRecipeStep(){
            $recipeStepId = $this->uri->segment(3);
            $recipeId = $this->uri->segment(4);
            $this->recipe_model->deleteRecipeStep($recipeId, $recipeStepId);
            $this->session->set_userdata('edit_recipe', 'stepDeleted');
            redirect('recipe/editRecipeView/'.$recipeId);
        }
        public function removeRecipeIngredient(){
            $recipeIngId = $this->uri->segment(3);
            $recipeId = $this->uri->segment(4);
            $this->recipe_model->deleteRecipeIngredient($recipeId, $recipeIngId);
            $this->session->set_userdata('edit_recipe', 'ingredientDeleted');
            redirect('recipe/editRecipeView/'.$recipeId);
        }
        public function editRecipeDatabase(){
            $recipeId = $this->uri->segment(3);
            if (empty($_FILES['userfile']['name'])){
                $this->form_validation->set_rules('recipe-name', 'Recipe Name', 'required');
                $this->form_validation->set_rules('recipe-description', 'Recipe Description', 'required');
                $this->form_validation->set_rules('recipe-prep-time', 'Preperation Time', 'required');
                $this->form_validation->set_rules('recipe-cook-time', 'Cook Time', 'required');
                $this->form_validation->set_rules('recipe-servings', 'Servings', 'required');
                if ($this->form_validation->run() == FALSE){
                    $this->editRecipeView();
                } else {
                    $this->recipe_model->updateRecipe($recipeId, [
                        'recipe_name'           => $this->input->post('recipe-name', true),
                        'recipe_description'    => $this->input->post('recipe-description', true),
                        'recipe_prep_time'      => $this->input->post('recipe-prep-time', true),
                        'recipe_cook_time'      => $this->input->post('recipe-cook-time', true),
                        'recipe_servings'     => $this->input->post('recipe-servings', true),
                        'recipe_category'       => $this->input->post('recipe-category', true)
                    ]);
                    $this->recipe_model->deleteStepAndIngredient($recipeId);
                    
                    $recipeIngredeints = $this->input->post('ingredient', true);
                    foreach($recipeIngredeints as $recipeIngredeint){
                        $this->recipe_model->insertIngredient([
                            'recipe_id'                 => $recipeId,
                            'recipe_ingredient_text'    => $recipeIngredeint
                        ]);
                    }
                    
                    $recipeSteps = $this->input->post('step', true);
                    foreach($recipeSteps as $recipeStep){
                        $this->recipe_model->insertStep([
                            'recipe_id'           => $recipeId,
                            'recipe_step_text'    => $recipeStep
                        ]);
                    }
                }
            } else {
                $config = [
                    'upload_path'   => './uploads/Foods/',
                    'allowed_types' => 'gif|jpg|png|jpeg'
                ];
                $this->form_validation->set_rules('recipe-name', 'Recipe Name', 'required');
                $this->form_validation->set_rules('recipe-description', 'Recipe Description', 'required');
                $this->upload->initialize($config);
                if ($this->form_validation->run() == FALSE){
                    $this->editRecipeView();
                } else {
                    if (!$this->upload->do_upload('userfile')) {
                        redirect('recipe/editRecipeView/'.$recipeId);
                    } else {
                        $imageName = $this->upload->data('file_name');
                        $this->recipe_model->updateRecipe($recipeId, [
                            'recipe_name'           => $this->input->post('recipe-name', true),
                            'recipe_description'    => $this->input->post('recipe-description', true),
                            'recipe_category'       => $this->input->post('recipe-category', true),
                            'recipe_image'          => $imageName
                        ]);
    
                        $this->recipe_model->deleteStepAndIngredient($recipeId);
                        $recipeIngredeints = $this->input->post('ingredient', true);
                        foreach($recipeIngredeints as $recipeIngredeint){
                            $this->recipe_model->insertIngredient([
                                'recipe_id'                 => $recipeId,
                                'recipe_ingredient_text'    => $recipeIngredeint
                            ]);
                        }
                        
                        $recipeSteps = $this->input->post('step', true);
                        foreach($recipeSteps as $recipeStep){
                            $this->recipe_model->insertStep([
                                'recipe_id'           => $recipeId,
                                'recipe_step_text'    => $recipeStep
                            ]);
                        }
                    }
                }
            }
            $this->session->set_userdata('edit_status', 'edited');
            redirect('recipe/myRecipeView');
        }
        public function shareRecipe(){
            // if not verified then can't share
            $tempChecker = $this->user_model->getVerificationStatus($this->session->userdata('logged_user'));
            $checkIfVerifiedAlready = $tempChecker[0]->user_verified;
            if($checkIfVerifiedAlready == "No"){
                $this->session->set_userdata('share_status', 'limit');
                redirect('recipe/myRecipeView');
            } else {
                $this->load->helper('date');
                date_default_timezone_set("Etc/GMT-4");
                $format = "%H:%i";
                $time = mdate($format);
                $date = date("F j, Y");
                $this->recipe_model->insertPost([
                    'recipe_id'           => $this->uri->segment(3),
                    'user_id'             => $this->session->userdata('logged_user'),
                    'recipe_post_time'    => $time,
                    'recipe_post_date'    => $date
                ]);
                $this->recipe_model->updateRecipe($this->uri->segment(3),[
                    'recipe_posted' => 'Yes'
                ]);
                $this->session->set_userdata('share_status', 'success');
                redirect('recipe/myRecipeView');
            }
        }
        public function deletePost(){
            $postId = $this->uri->segment(3);
            $recipeId = $this->uri->segment(4);
            $this->recipe_model->deletePost($postId);
            $this->recipe_model->updateRecipe($recipeId, [
                'recipe_posted' => 'No'
            ]);
            $this->session->set_userdata('post_status', 'deleted');
            redirect('recipe/postedRecipeView');
        }
    }
?>