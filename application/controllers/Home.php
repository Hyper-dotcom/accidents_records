<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//incarcare modele
		$this->load->model("Home_model");
		$this->load->model("Departamente_model");
		$this->load->model('sectoare_model');
	}

	public function index($sector = '') //functia index care primeste ca aprametru id ul sectorului pentru care realizam statisticile
	{	//initializare $data de tip vector
		$data = array();
		//echo "<script> console.log($sector) </script>";
		$data["sectoare"] = $this->sectoare_model->get_column('Nume');
		if ($sector == '') {
			$sector = 1;
		}
		//pentru sectorul selectat din pagina Home fac statisticile
		$data['s0'] = $this->sectoare_model->getCount($sector);
		$data['s1'] = $this->sectoare_model->getSum($sector, 'Invalizi');
		$data['s2'] = $this->sectoare_model->getSum($sector, 'Raniti');
		$data['s3'] = $this->sectoare_model->getSum($sector, 'Decedati');

		//aici incarc toate datele care vin din BD
		$data["countAngajati"] = $this->Home_model->count("Angajati");
		$data["countDep"] = $this->Home_model->count("Departamente");
		$data["countAccidente"] = $this->Home_model->count("Accidente");
		$data["countInvalizi"] = $this->Home_model->sum("Accidente", 'Invalizi');
		$data["countRaniti"] = $this->Home_model->sum("Accidente", 'Raniti');
		$data["countDecedati"] = $this->Home_model->sum("Accidente", 'Decedati');
		$data["managerAccidents"] = $this->Home_model->managerDepartamentAccidents();
		$data["topM"] = $this->Home_model->topManagerAccidents();
		$data["countVictimsForTopDepartament"] = $this->Home_model->countVictimsForDepartament();
		$data["mostRecentAcc"] = $this->Home_model->mostRecentAccident();
		$CatPerDep = $this->Home_model->victimeCategorieDepartament();
		$newCatPerDep = array();

		//aici sterg duplicatele care vin cu categorii diferite si cu acelasi nr de victime pentru un departament
		foreach ($CatPerDep as $k => $val) {
			if ($k === 0) {
				array_push($newCatPerDep, $val);
				continue;
			}
			if ($val['NumeDepartament'] == $CatPerDep[$k - 1]['NumeDepartament'])
				continue;
			array_push($newCatPerDep, $val);
		}

		$data['CatPerDep'] = $newCatPerDep;

		$this->load->view('home/index', $data); //incarcare view si trimitere date
	}
}
