<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Departamente extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Departamente_model");
            $this->load->model("Sectoare_model");
            $this->load->model("Angajati_model");
        }
        
        public function index(){
            $data["data"] = $this->Departamente_model->get();
            //print_r($data);
            $this->load->view("Departamente",$data);
        }

        public function delete($id = '') { //functie de stergere departament dupa ID
            if($this->Departamente_model->delete($id))
                redirect(base_url('Departamente'));
        }

        public function departament($id = '') //functie de adaugare/editare departament
        {   
            $data['id']=$id;
            $data['departament'] = null;
            //incarcare departamente pentru a le afisa in formul de optiuni
            $data["secOptions"] = $this->Sectoare_model->get_column("Nume");
            $data["managerOptions"] = $this->Angajati_model->get_column(["Nume", "Prenume"]);
            if($id){
                $data["departament"] = $this->Departamente_model->get($id)[0];
            } 
            if ($this->input->post()) {
                if ($id == '') { //daca ID-ul este gol atunci inseamna ca inseram un nou departament
                    $data = $this->input->post();
                    $id = $this->Departamente_model->add($data);
                    if ($id) {
                        //set_alert('success', _l('added_successfully', _l('client')));
                        redirect(base_url(('Departamente')));
                    } else {
                        redirect(base_url('Departamente'));
                        echo "<script type='text/javascript'>alert('Error');</script>"; //alert mesaj de eroare
                    }
                } else { //daca ID ul este setat atunci inseamna ca editam un departament
                    $success = $this->Departamente_model->update($this->input->post(null,false), $id);
                    if ($success == true) {
                        redirect(base_url("Departamente"));
                        // set_alert('success', _l('updated_successfully', _l('client')));
                    } else {
                        redirect(base_url('Departamente'));
                        echo "<script type='text/javascript'>alert('Error');</script>"; //alert mesaj de eroare
                    }
                }
            }
            $this->load->view('departament', $data);
        }
    }
?>