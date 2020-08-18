<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_register extends CI_Model {

	/*-- ACTION --*/
	public function user_create()
	{
		$user_code = strtolower(random_string('alnum',3)).date('y').strtolower(random_string('alnum',4)).date('d');
		$data = array(
		'user_fullname'		=> strip_tags($this->input->post('user_fullname')),
		'user_email'		=> strip_tags($this->input->post('user_email')),
		'user_password'		=> password_hash($this->input->post('user_password'),PASSWORD_BCRYPT),
		'user_code'			=> $user_code
		);
		$this->db->insert('user',$data);
		return $user_code;
	}

	public function user_update()
	{
		$user_code = strtolower(random_string('alnum',3)).date('y').strtolower(random_string('alnum',4)).date('d');
		$data = array(
		'user_code'			=> $user_code
		);
		$this->db->where('user_email',strip_tags($this->input->post('user_email')));
		$this->db->update('user',$data);
		return $user_code;
	}

	public function otp_create()
	{
		$data = array(
		'otp_phone'			=> strip_tags($this->input->post('otp_phone')),
		'otp_code'			=> random_string('numeric',6),
		'user_code'			=> strip_tags($this->input->post('user_code'))
		);
		$this->db->insert('otp',$data);
	}

	public function otp_update()
	{
		$otp_phone = strip_tags($this->input->post('otp_phone'));
		$data = array(
		'otp_phone'			=> $otp_phone,
		'otp_code'			=> random_string('numeric',6)
		);
		$this->db->where('otp_phone',$otp_phone);
		$this->db->set('otp_counter', 'otp_counter+1', FALSE);
		$this->db->update('otp',$data);
	}

	public function otp_delete()
	{
		$this->db->where('otp_code',strip_tags($this->input->post('otp_code')));
		$this->db->delete('otp');
	}

	public function user_verification()
	{
		$data = array(
		'is_verified'			=> 1,
		'user_phone'			=> strip_tags($this->input->post('user_phone'))
		);
		$this->db->where('user_code',strip_tags($this->input->post('user_code')));
		$this->db->update('user',$data);
	}
	/*-- #ACTION --*/

	/*-- CHECK --*/
	public function email_check()
	{
		$this->db->select('user_email');
		$this->db->from('user');
		$this->db->where('user_email',strip_tags($this->input->post('value')));
		$this->db->where('is_verified',1);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() < 1)
		{
			return TRUE;
		}
	}

	public function user_check()
	{
		$this->db->select('user_email');
		$this->db->from('user');
		$this->db->where('user_email',strip_tags($this->input->post('value')));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() < 1)
		{
			return TRUE;
		}
	}

	public function phone_validate_check()
	{
		$total_character = strlen($this->input->post('otp_phone'));
	    $phone_check1 = substr($this->input->post('otp_phone'),0,2);
	   	$phone_check2 = substr($this->input->post('otp_phone'),0,1);	
		if(($phone_check1 == '+6' || $phone_check2 == '0' || $phone_check2 == '6') && $total_character >= 9)
		{		
			return TRUE;
		}
	}

	public function phone_available_check()
	{
		$this->db->select('user_phone');
		$this->db->from('user');
		$this->db->where('user_phone',strip_tags($this->input->post('otp_phone')));
		$this->db->where('is_verified',1);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() < 1)
		{
			return TRUE;
		}
	}

	public function otp_check()
	{
		$this->db->select('otp_phone');
		$this->db->from('otp');
		$this->db->where('otp_phone',strip_tags($this->input->post('otp_phone')));
		$this->db->where('user_code',strip_tags($this->input->post('user_code')));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() < 1)
		{
			return TRUE;
		}
	}

	public function otp_count_check()
	{
		$this->db->select('otp_phone');
		$this->db->from('otp');
		$this->db->where('otp_phone',strip_tags($this->input->post('otp_phone')));
		$this->db->where('user_code',strip_tags($this->input->post('user_code')));
		$this->db->where('otp_counter',3);
		$query = $this->db->get();
		if($query->num_rows() < 1)
		{
			return TRUE;
		}
	}

	public function otp_code_check()
	{
		$this->db->select('otp_code');
		$this->db->from('otp');
		$this->db->where('otp_code',strip_tags($this->input->post('value')));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return TRUE;
		}
	}

	public function verification_check()
	{
		$this->db->select('otp_code');
		$this->db->from('otp');
		$this->db->where('otp_code',strip_tags($this->input->post('otp_code')));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return TRUE;
		}
	}
    /*-- #CHECK --*/
}