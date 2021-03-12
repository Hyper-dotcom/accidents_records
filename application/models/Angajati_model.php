<?php
class Angajati_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getWithFilter($filter) //functie de cautare, filtreaza datele dupa nume, prenume, citite de la tastatura
    {
        $q = "SELECT A.AngajatID, A.CNP, A.Nume, A.Prenume, D.NumeDepartament, A.Sex, A.DataAngajarii
        FROM Angajati A
        LEFT JOIN Departamente D
        ON A.DepartamentID = D.DepartamentID
        where a.Nume like '%$filter%' or a.Prenume like '%$filter%'";
        return $this->db->query($q)->result_array();
    }

    public function get($id = "")
    {
        if (isset($id) && $id != "") {
            $query = "Select * from Angajati where AngajatID =" . $id;
            return $this->db->query($query)->result_array();
        }

        $query = "SELECT A.AngajatID, A.CNP, A.Nume, A.Prenume, D.NumeDepartament, A.Sex, A.DataAngajarii
            FROM Angajati A
            LEFT JOIN Departamente D
            ON A.DepartamentID = D.DepartamentID";
        $rez = $this->db->query($query);
        return $rez->result_array();
    }

    public function add($data)
    {
        $q = "INSERT into Angajati (Nume, Prenume, CNP, Sex, DataAngajarii, DepartamentID) values
            ('" . $data["Nume"] . "', '" . $data["Prenume"] . "', '" . $data["CNP"] . "', '" . $data["Sex"] . "',
            '" . $data["DataAngajarii"] . "', '" . $data["DepartamentID"] . "')";

        //ORM equivalent
        //$this->db->insert('Angajati', $data);
        $this->db->query($q);

        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        $q = "UPDATE Angajati SET 
            CNP='" . $data["CNP"] . "',
            Nume='" . $data["Nume"] . "',
            Sex='" . $data["Sex"] . "',
            Prenume='" . $data["Prenume"] . "',
            DataAngajarii='" . $data["DataAngajarii"] . "',
            DepartamentID='" . $data["DepartamentID"] . "' 
            WHERE AngajatID='" . $id . "'";
        $this->db->query($q);

        //ORM equivalent
        // $this->db->where('AngajatID', $id);
        // $this->db->update('Angajati', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function delete($id = '')
    {
        if (!isset($id) || $id == '')
            return  false;
        $q = "DELETE from Angajati where AngajatID='" . $id . "'";
        $this->db->query($q);

        //ORM equivalent
        // $this->db->where('AngajatID', $id);
        // $this->db->delete('Angajati');

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

        $query = "Select AngajatID" . $q . " from Angajati";
        return $this->db->query($query)->result_array();
    }
}
