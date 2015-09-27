<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Songs extends CI_Controller {

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
		$this->load->model('Artists_model');
		$artistModel = new Artists_model();
		$data['artist'] = $artistModel->getRandomArtists(30);
		$this->load->view('songs_view', $data);
	}
	public function getSongs($artist)
	{
		$this->load->model('Artists_model');
		$artistModel = new Artists_model();
		echo json_encode($artistModel->getSongs($artist));
	}
	public function openProfile($artist)
	{
		$artist = urldecode($artist);
		$this->load->helper('url');
		$this->load->model('Artists_model');
		$artistModel = new Artists_model();
		$data = $artistModel->getProfile($artist);
		$this->load->view('profile_view', $data);
	}
}