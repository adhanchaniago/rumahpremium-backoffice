<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_register');
    }

	/*-- VIEW --*/
	public function index()
	{
		$this->load->view('frame/header');
		$this->load->view('register/register-form');
		$this->load->view('frame/footer');
	}

	public function phone($user_code)
	{
		$data['user_code'] = $user_code;
		$this->load->view('frame/header');
		$this->load->view('register/phone',$data);
		$this->load->view('frame/footer');
	}

	public function information()
	{
		$this->load->view('frame/header');
		$this->load->view('register/information');
		$this->load->view('frame/footer');
	}
	/*-- #VIEW --*/

	/*-- ACTION --*/
	public function user()
	{
	  	if($this->form_validation->run('register') == TRUE)
	   	{
			$user_check = $this->model_register->user_check();
	   		if($user_check)
	   		{
	   			$user_code = $this->model_register->user_create();
	   		}
	   		else
	   		{
	   			$user_code = $this->model_register->user_update();
	   		}
			redirect('register/phone/'.$user_code);
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function otp()
	{	
		$phone_validate_check = $this->model_register->phone_validate_check();
		if($phone_validate_check)
		{
			$phone_available_check = $this->model_register->phone_available_check();
			if($phone_available_check)
			{
				$otp_count_check = $this->model_register->otp_count_check();
		   		if($otp_count_check)
		   		{
					$otp_check = $this->model_register->otp_check();
			   		if($otp_check)
			   		{
						$this->model_register->otp_create();
					}
					else
					{
						$this->model_register->otp_update();
					}
					return $this->output
		            ->set_content_type('application/json')
		            ->set_status_header(200)
		            ->set_output(json_encode(array(
		                'status' => 1,
		                'count'	=> 1
		            )));
		        }
		        else
		        {
					return $this->output
		            ->set_content_type('application/json')
		            ->set_status_header(200)
		            ->set_output(json_encode(array(
		                'status' => 1,
		                'count'	=> 0
		            )));
		        }
			}
			else
			{
				return $this->output
	            ->set_content_type('application/json')
	            ->set_status_header(200)
	            ->set_output(json_encode(array(
	                'status' => 2
	            )));
			}
		}
		else
		{
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                'status' => 0
            )));
		}
	}

	public function verification()
	{
		$otp_check = $this->model_register->verification_check();
	  	if($otp_check)
	   	{
			$this->model_register->user_verification();
			$this->model_register->otp_delete();
			redirect('home');
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	/*-- #ACTION --*/

	/*-- CHECK --*/
   	public function email_check()
	{
        $this->form_validation->set_rules('value','required','required|valid_email|callback_ajax_email_check');
		if($this->form_validation->run())
		{
            echo'success';
		}
	}

	public function ajax_email_check()
	{	
		$email_check = $this->model_register->email_check();
	  	if($email_check)
	   	{
			return TRUE;
		}
	}

   	public function otp_check()
	{
        $this->form_validation->set_rules('value','required','required|callback_ajax_otp_check');
		if($this->form_validation->run())
		{
            echo'success';
		}
	}

	public function ajax_otp_check()
	{	
		$otp_check = $this->model_register->otp_code_check();
	  	if($otp_check)
	   	{
			return TRUE;
		}
	}

	public function otp_code_check()
	{	
		$otp_check = $this->model_register->otp_code_check();
	  	if($otp_check)
	   	{
			echo 'success';
		}
	}
	/*-- #CHECK --*/
}