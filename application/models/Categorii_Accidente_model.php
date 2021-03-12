<?php
    class Categorii_Accidente_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        function get(){
            $query = "Select * from CategoriiAccidente";
            $rez = $this->db->query($query);
            return $rez->result_array();
        }
    }
?>