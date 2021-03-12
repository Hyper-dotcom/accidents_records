<?php
    class Sectoare_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }
        public function get($id=""){
            if(isset($id) && $id !=""){
               $query = "Select * from Sectoare where SectorID =".$id;
               return $this->db->query($query)->result_array();
            }

            $query = "SELECT * from Sectoare";
            $rez = $this->db->query($query);
            return $rez->result_array();
        }

        public function getCount($sectorId){ 
            $q="SELECT distinct s.Nume, 
            (select Count(*) from Accidente a where a.DepartamentID=d.DepartamentID) as accidente 
            from Sectoare s
            inner join Departamente d 
            on d.SectorID=s.SectorID 
            where s.SectorID='$sectorId'";

            return $this->db->query($q)->result_array();
        }

        public function getSum($sectorId,$field=""){ //primeste id ul si face suma dintre campurilor trimise
            if($field=="")
                return false;

            $q="SELECT distinct s.Nume, 
            (select Sum($field) from Accidente a where a.DepartamentID=d.DepartamentID) as total 
            from Sectoare s
            inner join Departamente d 
            on d.SectorID=s.SectorID 
            where s.SectorID='$sectorId'";
            
            return $this->db->query($q)->result_array();
        }


        public function get_column($column){ //intoarce o coloana si Id ul 
            $query = "SELECT SectorID, ".$column." from Sectoare";
            return $this->db->query($query)->result_array();
        }
    }
?>