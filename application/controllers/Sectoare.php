<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sectoare extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Sectoare_model");
        }
        
        public function index(){
            $data["data"] = $this->Sectoare_model->get();
            //print_r($data);
            $this->load->view("Sectoare",$data);
        }
    }
?>