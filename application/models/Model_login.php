<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	/*-- CHECK --*/
	public function email_check()
	{
		$this->db->select('id_user');
		$this->db->from('user');
		$this->db->where('user_email', $this->input->post('value'));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return TRUE;
		}
	}

	public function phone_check()
	{
		$this->db->select('id_user');
		$this->db->from('user');
		$this->db->where('user_phone', $this->input->post('value'));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return TRUE;
		}
	}

	public function login_check()
	{
		$this->db->select('*');
		$this->db->from('user');
		if($this->input->post('type') == 'email')
		{
			$this->db->where('user_email',$this->input->post('user_access'));
		}
		elseif($this->input->post('type') == 'phone')
		{
			$this->db->where('user_phone',$this->input->post('user_access'));
		}
		$query = $this->db->get();
		$result = $query->row();
		if($query->num_rows() == 1 && password_verify($this->input->post('user_password'),$result->user_password))
		{
			return $query->row();
		}
	}
    /*-- #CHECK --*/
}