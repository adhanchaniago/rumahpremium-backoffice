<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }

	public function index()
	{
		if(!isset($this->session->userdata['rumahpremium_member']))
		{		
			$this->load->view('frame/header');
			$this->load->view('login/login-form');
			$this->load->view('frame/footer');
		}
		else
		{
			redirect('dashboard');
		}
	}

	public function member()
	{	
	  	if($this->form_validation->run('login') == TRUE)
	   	{
			redirect('dashboard');
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function forgot()
	{
		$this->load->view('login/forgot-form');
	}


	/*-- CHECK --*/
   	public function user_email()
	{
        $this->form_validation->set_rules('value','required','required|callback_ajax_email_check');
		if($this->form_validation->run() == TRUE)
		{
            echo'success';
		}
	}

   	public function user_phone()
	{
        $this->form_validation->set_rules('value','required','required|callback_ajax_phone_check');
		if($this->form_validation->run() == TRUE)
		{
            echo'success';
		}
	}

	public function ajax_email_check()
	{
		$result = $this->model_login->email_check();
		if($result)
		{
			return TRUE;
		}
	}

	public function ajax_phone_check()
	{
		$result = $this->model_login->phone_check();
		if($result)
		{
			return TRUE;
		}
	}

   	public function user_login()
	{
		$this->form_validation->set_rules('user_access','required','required');
        $this->form_validation->set_rules('user_password','required','required|callback_login_check');
		if($this->form_validation->run() == TRUE)
		{
            echo'success';
		}
	}

	public function login_check()
	{
		$result = $this->model_login->login_check();
		if($result)
		{
			return TRUE;
		}
	}

	public function member_check()
	{
		$result = $this->model_login->login_check();
		if($result)
		{
			$session_user = array();
			$session_user = array(
				'id_user' => $result->id_user
			);
			$this->session->set_userdata('rumahpremium_member', $session_user);
			return TRUE;
		}
	}
	/*-- #CHECK --*/

}