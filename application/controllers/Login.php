<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function  __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

    public function index(){
		$data = array(
			'title' => "Login",
		);
		$this->load->view('Login', $data);
    }

	public function checkCredentials(){
		$data['username'] = $this->input->post('username');
		$data['pass'] = $this->input->post('password');
		// echo $username;
		// echo $pass;
		$data['title'] = "Login";
		$dataRetrieved = $this->Login_model->getCredit();
		if($data['username']===$dataRetrieved[0]['UserBD'] && $data['pass']===$dataRetrieved[0]["Parola"]){
			redirect(base_url("Home"));
		} else {
			$this->load->view('Login',$data);
		}
	}

	public function auth_login() {
		$data = array(
			'title' => "Login to Database",
		);
		$this->load->view('Login', $data);
		
		//echo($this->uri->segment(2));
	}

}
?>