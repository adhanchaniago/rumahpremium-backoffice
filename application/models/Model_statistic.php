<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_statistic extends CI_Model {

	/* -- VIEW -- */
	public function item_total($product_field,$product_value)
	{
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where($product_field,$product_value);
		$query = $this->db->get();
		return $query->num_rows();
	}
	/* -- #VIEW -- */
}