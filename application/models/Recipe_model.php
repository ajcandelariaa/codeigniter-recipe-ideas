<?php 
     class Recipe_model extends CI_Model{

        // INSERT INFO
        public function insertRecipe($array){
            $this->db->insert('recipe', $array);
        }
        public function insertIngredient($array){
            $this->db->insert('recipe_ingredient', $array);
        }
        public function insertStep($array){
            $this->db->insert('recipe_step', $array);
        }
        public function insertPost($array){
            $this->db->insert('recipe_post', $array);
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */
        // GET INFO
        public function getLatestRecipeId($id){
            $this->db->where('user_id', $id);  
            $this->db->select_max('recipe_id');
            $q = $this->db->get('recipe');
            return $q->result();
        }
        public function getRecipeInfo($id){
            $q = $this->db->query("SELECT * FROM recipe WHERE user_id=$id ORDER BY recipe_id DESC");
            return $q->result();
        }
        public function getRecipeRows($id){
            $q = $this->db->query("SELECT * FROM recipe WHERE user_id=$id");
            return $q->num_rows();
        }
        public function getRecipeOne($id){
            $q = $this->db->query("SELECT * FROM recipe WHERE recipe_id=$id");
            return $q->result();
        }
        public function getRecipeSteps($id){
            $q = $this->db->query("SELECT * FROM recipe_step WHERE recipe_id=$id");
            $numRows = $q->num_rows();
            if($numRows == 0){
                return "";
            } else {
                return $q->result();
            }
        }
        public function getRecipeIngredients($id){
            $q = $this->db->query("SELECT * FROM recipe_ingredient WHERE recipe_id=$id");
            $numRows = $q->num_rows();
            if($numRows == 0){
                return "";
            } else {
                return $q->result();
            }
        }
        public function getLimitedPostedRecipes($limit, $offset){
            $this->db->limit($limit, $offset);
            $this->db->order_by('recipe_post_id', 'DESC');
            $q = $this->db->get("recipe_post");
            return $q->result();
        }
        public function getAllPostedRecipes($id){
            $this->db->where('user_id', $id);
            $this->db->order_by('recipe_post_id', 'DESC');
            $q = $this->db->get("recipe_post");
            return $q->result();
        }
        public function getPostedRecipesRows($id){
            $this->db->where('user_id', $id);
            $q = $this->db->get("recipe_post");
            return $q->num_rows();
        }
        public function getPostRows(){
            $q = $this->db->get("recipe_post");
            return $q->num_rows();
        }
        public function getOnePostedRecipe($id){
            $this->db->where('recipe_post_id', $id);
            $q = $this->db->get("recipe_post");
            return $q->result();
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */
        // UPDATE INFO
        public function updateRecipe($id, $array){
            $this->db->where('recipe_id', $id);
            $this->db->update('recipe', $array);
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */
        // DELETE INFO
        public function deleteRecipe($id){
            $this->db->delete('recipe', ['recipe_id' => $id]);
            $this->db->delete('recipe_step', ['recipe_id' => $id]);
            $this->db->delete('recipe_ingredient', ['recipe_id' => $id]);
            $this->db->delete('recipe_post', ['recipe_id' => $id]);
        }
        public function deleteRecipeStep($id, $id2){
            $this->db->delete('recipe_step', ['recipe_id' => $id, 'recipe_step_id' => $id2]);
        }
        public function deleteRecipeIngredient($id, $id2){
            $this->db->delete('recipe_ingredient', ['recipe_id' => $id, 'recipe_ingredient_id' => $id2]);
        }
        public function deleteStepAndIngredient($id){
            $this->db->delete('recipe_step', ['recipe_id' => $id]);
            $this->db->delete('recipe_ingredient', ['recipe_id' => $id]);
        }
        public function deletePost($id){
            $this->db->delete('recipe_post', ['recipe_post_id' => $id]);
        }
    }

?>