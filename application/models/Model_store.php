<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_store extends CI_Model {

	/* -- VIEW -- */
	public function store_detail($store_code)
	{
		$this->db->select('*');
		$this->db->from('store');
		$this->db->where('store_code',$store_code);
		$query = $this->db->get();
		return $query->row();
	}
	/* -- #VIEW -- */
}