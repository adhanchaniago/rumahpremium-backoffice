<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['basetitle'] = 'Statistik';
		$data['subtitle'] = 'Dashboard';
		$data['title'] = '';
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$this->load->view('frame/breadcrumb',$data);
		$this->load->view('home');
		$this->load->view('frame/footer');
	}
}