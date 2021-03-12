<?php
    class Accidente_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();//rulare constructorul clasei parinte
        }
        //Modelele pentru Accidente, aici scriu query-urile si le execut, folosind clasa predefinita db
        //query urile intorc niste obiecte cu mai multe detalii, pe langa datele din tabel, iar functia
        //result_array imi selecteaza doar datele din tabel si intoarce un vector cu acestea
       public function get($id=""){ //functie ce intoarce toate datele din tabel
            if(isset($id) && $id !=""){
               $query = "Select * from Accidente where AccidentID =".$id;
               return $this->db->query($query)->result_array();
            }

            $query = "SELECT A.AccidentID, A.Data, A.Raniti, A.Decedati, D.NumeDepartament, A.Invalizi 
            FROM Accidente A
            LEFT JOIN Departamente D
            ON A.DepartamentID = D.DepartamentID";
            $rez = $this->db->query($query);
            return $rez->result_array();
        }
        //functie de inserare de noi date, returneaza id-ul noului camp creat
        public function add($data){
            $q = "INSERT into Accidente (Data, Raniti, Decedati, Invalizi, DepartamentID) values
            ('".$data["Data"]."', '".$data["Raniti"]."', '".$data["Decedati"]."', '".$data["Invalizi"]."',
            '".$data["DepartamentID"]."')";
            
            $this->db->query($q);
            return $this->db->insert_id();
        }
        //functie de update, returneaza truse sau false
        public function update($data, $id){
            $q= "UPDATE Accidente SET 
            Data='".$data["Data"]."',
            Raniti='".$data["Raniti"]."',
            Decedati='".$data["Decedati"]."',
            Invalizi='".$data["Invalizi"]."',
            DepartamentID='".$data["DepartamentID"]."' 
            WHERE AccidentID='".$id."'";
            $this->db->query($q);

            if ($this->db->affected_rows() > 0) { //intoare true daca este afectat vreun rand(adica update ul a avut loc)
                return true;
            }
            return false;
        } 
        //functia de stergere, reuturneaza true sau false, daca s-a realizat sau nu stergerea
        public function delete($id=''){
            if(!isset($id) || $id=='')
                return  false;
            $q = "DELETE from Accidente where AccidentID='".$id."'";
            $this->db->query($q);

            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }

        public function get_column($columns){ //functie ce intoare doar coloanele pe care le trimit ca parametru si coloana cu ID
            $q="";
            for($i=0; $i<count($columns); $i++)
                $q = $q.", ". $columns[$i];
            
            $query = "Select AccidentID".$q." from Accidente";
            return $this->db->query($query)->result_array();
        }
    }
