<?php 
    class User_model extends CI_Model{

        // INSERT INFO
        public function insertUser($array){
            $this->db->insert('user', $array);
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */
        // GET INFO
        public function getLogin($username, $password){
            $this->db->where('user_username', $username);  
            $this->db->where('user_password', $password);  
            $q = $this->db->get('user');
            if ($q->num_rows() == 1){  
                return $q->result();  
            } else {
                return 0;  
            }
        }
        public function getUserInfo($id){
            $this->db->where('user_id', $id);
            $q = $this->db->get('user');
            return $q->result();
        }
        public function getNextUserId(){
            $this->db->order_by('user_id', 'DESC');
            $this->db->limit(1);
            $this->db->select('user_id');
            $q = $this->db->get("user");
            return $q->result();
        }
        public function getVerificationStatus($id){
            $this->db->where('user_id', $id);
            $q = $this->db->get('user');
            return $q->result();
        }
        /* 
        ===============================================================================================================================
        ===============================================================================================================================
        ===============================================================================================================================
        */
        // UPDATE INFO
        public function updateUserInfo($id, $array){
            $this->db->where('user_id', $id);
            $this->db->update('user', $array);
        }
    }

?>