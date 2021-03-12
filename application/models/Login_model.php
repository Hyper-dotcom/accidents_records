<?php
    class Login_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }
            
        function getCredit(){
            $query = $this->db->get('Credentiale');
            return $query->result_array();

        }
    }
?>