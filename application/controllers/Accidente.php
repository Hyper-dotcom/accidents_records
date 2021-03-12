<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Accidente extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            //incarcare modele
            $this->load->model("Accidente_model");
            $this->load->model("Departamente_model");
        }
        
        public function index(){//functia index care este rulata default cand se acceseaza pagina Accidente
            $data["data"] = $this->Accidente_model->get(); //incare date
            //print_r($data);
            $this->load->view("Accidente",$data);
        }

        public function delete($id = '') { //functie de stergere dupa ID
            if($this->Accidente_model->delete($id))
                redirect(base_url('Accidente'));

        }
        public function accident($id = '') //functie de adaugare/editare accident
        {   
            $data['id']=$id;
            $data['accident'] = null;
            //incarcare departamente pentru a le afisa in formul de optiuni
            $data["depOptions"] = $this->Departamente_model->get_column("NumeDepartament");

            if($id){
                $data["accident"] = $this->Accidente_model->get($id)[0];
            }
             
            if ($this->input->post()) {
                if ($id == '') { //daca ID-ul este gol atunci inseamna ca inseram un nou record
                    $data = $this->input->post();
                    $id = $this->Accidente_model->add($data);
                    if ($id) {
                        //set_alert('success', _l('added_successfully', _l('client'))); //alerta ca actiunea s-a realizatr cu succes
                        redirect(base_url(('Accidente')));
                    } else {
                        redirect(base_url('Accidente'));
                        echo "<script type='text/javascript'>alert('Error');</script>"; //alert mesaj de eroare
                    }
                } else { //daca ID ul este setat atunci inseamna ca editam un record existent
                    $success = $this->Accidente_model->update($this->input->post(null,false), $id);
                    if ($success == true) {
                        redirect(base_url("Accidente"));
                        // set_alert('success', _l('updated_successfully', _l('client')));
                    } else {
                        redirect(base_url('Accidente'));
                        echo "<script type='text/javascript'>alert('Error');</script>"; //alert mesaj de eroare
                    }
                }
            }
            $this->load->view('accident', $data);//incarcare pagina de edit/adaugare
        }
    }
