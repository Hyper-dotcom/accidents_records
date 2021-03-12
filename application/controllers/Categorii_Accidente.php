<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Categorii_Accidente extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Categorii_Accidente_model");
        }
        
        public function index(){
            $data["data"] = $this->Categorii_Accidente_model->get();
            //print_r($data);
            $this->load->view("Categorii_Accidente",$data);
        }
    }
?>