<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {

	/*-- VIEW --*/
	public function menu_top_list()
	{
		$this->db->select('*');
		$this->db->from('menu_top');
		$this->db->order_by('menu_top_order','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function menu_list($id_menu_top)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('id_menu_top',$id_menu_top);
		$this->db->order_by('menu_order','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function menu_sub_list($id_menu)
	{
		$this->db->select('*');
		$this->db->from('menu_sub');
		$this->db->where('id_menu',$id_menu);
		$this->db->order_by('menu_sub_order','ASC');
		$query = $this->db->get();
		return $query->result();
	}
    /*-- #VIEW --*/
}