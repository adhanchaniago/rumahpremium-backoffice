<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	/*-- VIEW --*/
	public function profile()
	{
		if(isset($this->session->userdata['rumahpremium_member']))
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user',$this->session->userdata['rumahpremium_member']['id_user']);
			$query = $this->db->get();
			return $query->row();
		}
	}
	/*-- #VIEW --*/
}