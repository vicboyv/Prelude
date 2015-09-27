<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('login_view');
	}
	public function enter()
	{
		$this->load->database();
		$this->db->select("name");
		$this->db->where('name', $_POST['username']);
		$this->db->where('password', $_POST['password']);
		$query = $this->db->get('artists', 1);
		$results = $query->result_array();
		if(count($results) > 0)
		{
			session_start();
			$_SESSION['user'] = $results[0]['name'];
			header("Location: /hackup/index.php");
		}
		else
		{
			header("Location: /hackup/index.php/login");
		}
	}
}