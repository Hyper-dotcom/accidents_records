<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Angajati extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Angajati_model");
            $this->load->model("Departamente_model");
        }
        
        public function index(){ //pagina princiapala care este accesata de fiecare data cand este accesat controllerul
            $filter='';
            if($this->input->post('searchTerm'))
                {
                    $filter=$this->input->post('searchTerm');
                }
            
            if(isset($filter) && $filter != '')
                $data["data"] = $this->Angajati_model->getWithFilter($filter);
            else 
                $data["data"] = $this->Angajati_model->get();

            //print_r($data);
            $this->load->view("Angajati",$data);
        }

        public function delete($id = '') { //functie de stergere angajat dupa ID
            if($this->Angajati_model->delete($id))
                redirect(base_url('Angajati'));

        }
        public function angajat($id = '') //functie de adaugare/editare angajat
        {   
            $data['id']=$id;
            $data['angajat'] = null;
            //incarcare departamente pentru a le afisa in formul de optiuni
            $data["depOptions"] = $this->Departamente_model->get_column("NumeDepartament");

            if($id){
                $data["angajat"] = $this->Angajati_model->get($id)[0];
            } 
            if ($this->input->post()) {
                if ($id == '') { //daca ID-ul este gol atunci inseamna ca inseram un nou angajat
                    $data = $this->input->post();
                    $id = $this->Angajati_model->add($data);
                    if ($id) {
                        //set_alert('success', _l('added_successfully', _l('client')));
                        redirect(base_url(('Angajati')));
                    } else {
                        redirect(base_url('Angajati'));
                        echo "<script type='text/javascript'>alert('Error');</script>"; //alert mesaj de eroare
                    }
                } else { //daca ID ul este setat atunci inseamna ca editam un angajat
                    $success = $this->Angajati_model->update($this->input->post(null,false), $id);
                    if ($success == true) {
                        redirect(base_url("Angajati"));
                        // set_alert('success', _l('updated_successfully', _l('client')));
                    } else {
                        redirect(base_url('Angajati'));
                        echo "<script type='text/javascript'>alert('Error');</script>"; //alert mesaj de eroare
                    }
                }
            }
            $this->load->view('angajat', $data);
        }

    }
