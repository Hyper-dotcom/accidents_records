<?php
class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //aici fac toate query urile din pagina Home, pentru a realiza statisticile
    public function mostRecentAccident() //cel mai recent accident si departamentul in care a avut loc
    {
        $q = "SELECT top 1 d.NumeDepartament, a.Data 
            from Accidente a
            inner join Departamente d 
            on d.DepartamentID=a.DepartamentID
            group by d.NumeDepartament, a.Data
            order by a.Data desc";
        return $this->db->query($q)->result_array();
    }

    public function count($tablename = "")//functie de numarare cu parametru numele tabelului
    {
        if($tablename== "")
            return false;
        $q = "Select Count(*) Total from " . $tablename;
        return $this->db->query($q)->result_array();
    }

    public function victimeCategorieDepartament()//Categoria cu cele mai multe victime in fiecare deaprtament
    {
        $q = "SELECT d.NumeDepartament, ea.CategorieID, Count(ea.AngajatID) victime
            from EvidentaAccidente ea             
            inner join Accidente a on a.AccidentID = ea.AccidentID
            inner join Departamente d on d.DepartamentID = a.DepartamentID
            group by d.NumeDepartament, ea.CategorieID
            having Count(ea.AngajatID) = (select top 1 Count(ea1.AngajatID) victime1
                                            from EvidentaAccidente ea1 
                                            inner join Accidente a1 on a1.AccidentID = ea1.AccidentID
                                            inner join Departamente d1 on d1.DepartamentID = a1.DepartamentID
                                            group by d1.NumeDepartament, ea1.CategorieID
                                            having d1.NumeDepartament=d.NumeDepartament
                                            order by victime1 desc)
            order by d.NumeDepartament, victime desc";

        return $this->db->query($q)->result_array();
    }

    public function countVictimsForDepartament()
    {
        $q = "SELECT d.NumeDepartament,a.Nume+' '+a.Prenume Manager,
            sum(ac.Raniti)+sum(ac.Decedati)+sum(ac.Invalizi) as victime 
            from Accidente ac, Departamente d
            inner join Angajati a on AngajatID=d.ManagerID
            where d.DepartamentID = ac.DepartamentID
            group by d.NumeDepartament,a.nume,a.prenume
            order by victime desc";

        return $this->db->query($q)->result_array();
    }

    public function topManagerAccidents()
    {
        $q = "SELECT distinct top 3 a.Nume+' '+a.Prenume Nume, 
            (select Count(*) from Accidente ac 
            where ac.DepartamentID in 
            (select d2.DepartamentID from Departamente d2 where d2.ManagerID=a.AngajatID)) Accidente
            from Angajati a
            inner join Departamente d on a.AngajatID=d.ManagerID
            order by Accidente desc";
        return $this->db->query($q)->result_array();
    }

    public function managerDepartamentAccidents()
    {
        $q = "SELECT distinct a.Nume+' '+a.Prenume Nume, d.NumeDepartament,
            (select Count(*) from Accidente ac where ac.DepartamentID=d.DepartamentID) 
            as Accidente
            from Angajati a 
            inner join Departamente d on a.AngajatID = d.ManagerID 
            order by Accidente DESC";
        return $this->db->query($q)->result_array();
    }

    public function sum($tablename = "", $field = "")
    {
        $q = "Select Sum(" . $field . ") Total from " . $tablename;
        return $this->db->query($q)->result_array();
    }

    public function get($id = "")
    {
        if (isset($id) && $id != "") {
            $query = "Select * from Accidente where AccidentID =" . $id;
            return $this->db->query($query)->result_array();
        }

        $query = "SELECT A.AccidentID, A.Data, A.Raniti, A.Decedati, D.NumeDepartament, A.Invalizi 
            FROM Accidente A
            LEFT JOIN Departamente D
            ON A.DepartamentID = D.DepartamentID";
        $rez = $this->db->query($query);
        return $rez->result_array();
    }

    public function add($data)
    {
        $q = "INSERT into Accidente (Data, Raniti, Decedati, Invalizi, DepartamentID) values
            ('" . $data["Data"] . "', '" . $data["Raniti"] . "', '" . $data["Decedati"] . "', '" . $data["Invalizi"] . "',
            '" . $data["DepartamentID"] . "')";
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        $q = "UPDATE Accidente SET 
            Data='" . $data["Data"] . "',
            Raniti='" . $data["Raniti"] . "',
            Decedati='" . $data["Decedati"] . "',
            Invalizi='" . $data["Invalizi"] . "',
            DepartamentID='" . $data["DepartamentID"] . "' 
            WHERE AccidentID='" . $id . "'";
        $this->db->query($q);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function get_column($columns)
    {
        $q = "";
        for ($i = 0; $i < count($columns); $i++)
            $q = $q . ", " . $columns[$i];

        $query = "Select AccidentID" . $q . " from Accidente";
        return $this->db->query($query)->result_array();
    }
}
