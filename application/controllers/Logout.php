<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	/*-- ACTION --*/
	public function index()
	{
		$this->session->unset_userdata('rumahpremium_member');
		redirect('home');
	}
	/*-- #ACTION --*/
}