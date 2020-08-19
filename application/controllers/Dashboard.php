<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_statistic');
    }	

	public function index()
	{
		$data['basetitle'] = 'Statistik';
		$data['subtitle'] = 'Dashboard';
		$data['title'] = '';
		$data['item_rumah_total'] = $this->model_statistic->item_total('category','rumah');
		$data['item_apartment_total'] = $this->model_statistic->item_total('category','apartment');
		$data['item_komersial_total'] = $this->model_statistic->item_total('category','komersial');
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$this->load->view('frame/breadcrumb',$data);
		$this->load->view('home',$data);
		$this->load->view('frame/footer');
	}
}