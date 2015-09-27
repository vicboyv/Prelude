<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		$this->load->view('register_view');
	}
	public function submit()
	{
		$this->load->database();
		$data = array(
			   'name' => $_POST['username'] ,
			   'password' => $_POST['password'] ,
			   'type' => $_POST['type']
			);
		$this->db->insert('artists', $data); 
		session_start();
		$_SESSION['user'] = $_POST['username'];
		header("Location: http://localhost/hackup/index.php");
	}
}