<?php
    class Departamente_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function get($id=""){
            if(isset($id) && $id !=""){
                $query = "Select * from Departamente where DepartamentID =".$id;
                return $this->db->query($query)->result_array();
             }

            $query = "SELECT A.DepartamentID, A.NumeDepartament, S.Nume Sector, Ang.Nume +' '+Ang.Prenume AS ManagerID
            FROM Departamente A
            LEFT JOIN Sectoare S
            ON A.SectorID = S.SectorID
            left join Angajati Ang ON A.ManagerID = Ang.AngajatID";
            $rez = $this->db->query($query);
            return $rez->result_array();
        }

        public function get_column($column){
            $query = "Select DepartamentID, ".$column." from Departamente";
            return $this->db->query($query)->result_array();
        }

        public function add($data){
            $q = "INSERT into Departamente (NumeDepartament, SectorID, ManagerID) values
            ('".$data["NumeDepartament"]."', '".$data["SectorID"]."','".$data["ManagerID"]."')";

            $this->db->query($q);
            return $this->db->insert_id();
        }

        public function update($data, $id){
            $q= "UPDATE Departamente SET 
            NumeDepartament='".$data["NumeDepartament"]."',
            SectorID='".$data["SectorID"]."',
            ManagerID='".$data["ManagerID"]."' 
            WHERE DepartamentID='".$id."'";
            $this->db->query($q);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        } 

        public function delete($id=''){
            if(!isset($id) || $id=='')
                return  false;
            $q = "DELETE from Departamente where DepartamentID='".$id."'";
            $this->db->query($q);

            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }
        
    }
?>