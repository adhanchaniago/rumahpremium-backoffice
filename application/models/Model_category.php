<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_category extends CI_Model {

	/* -- TABLE -- */
	var $table = 'category';
	var $column_order = array(null,null,'category_name',null,'category_created_date','category_updated_date');
	var $column_search = array('category_name');
	var $order = array('category_name' => 'asc');
	
	private function list_category_api()
	{
		$id_store = store_detail(store_used())->id_store;
		$this->db->from('category');
		$this->db->where('id_store',$id_store);
		$i = 0;
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value'])
			{
				if($i===0)
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i)
				$this->db->group_end();
			}
			$i++;
		}
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->list_category_api();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->list_category_api();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$id_store = store_detail(store_used())->id_store;
		$this->db->from('category');
		$this->db->where('id_store',$id_store);
		return $this->db->count_all_results();
	}
	/* -- #TABLE -- */

	/* -- VIEW -- */
	public function category_list()
	{
		$id_store = store_detail(store_used())->id_store;
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id_store',$id_store);
		$query = $this->db->get();
		return $query->result();
	}

	public function category_total($category_field,$category_value)
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where($category_field,$category_value);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function category_detail($category_field,$category_value)
	{
		$id_store = store_detail(store_used())->id_store;
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id_store',$id_store);
		$this->db->where($category_field,$category_value);
		$query = $this->db->get();
		return $query->row();
	}
	/* -- #VIEW -- */

	/*-- ACTION --*/
	public function action($type)
	{
		switch ($type)
		{
			case "create":
			$data = array(
			'category_code'   		=> strip_tags($this->input->post('category_code')),
			'category_name'   		=> strip_tags($this->input->post('category_name')),
			'category_url'   		=> strip_tags(strtolower(url_title($this->input->post('category_name')))),
			'category_image'  		=> strip_tags($this->input->post('category_image')),
			'id_store'				=> store_detail(store_used())->id_store,
			'category_created_by'  	=> strip_tags(member()->user_fullname)
			);
			$this->db->insert('category',$data);
			break;

			case "delete":
			$array_id = explode(',',$this->input->post('array_id'));
			$this->db->where_in('category_code',$array_id);
			$this->db->delete('category');
			break;
		}
	}

	public function upload_image($type,$type_code,$image)
	{
		$directory_image = 'assets/'.$type.'/'.$type_code;
		copy($directory_image.'/temp/'.$image,$directory_image.'/'.$image);
	}
    /*-- #ACTION --*/
}