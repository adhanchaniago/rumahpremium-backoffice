<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	public function information()
	{
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$this->load->view('store/information');
		$this->load->view('frame/footer');
	}
}