<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_item extends CI_Model {

	/* -- TABLE -- */
	var $table = 'item';
	var $column_order = array(null);
	var $column_search = array('title_item');
	var $order = array('title_item' => 'desc');
	
	private function list_item_api()
	{
		$this->db->from('item');
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
		$this->list_item_api();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->list_item_api();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('item');
		return $this->db->count_all_results();
	}
	/* -- #TABLE -- */

	/* -- VIEW -- */
	public function item_list()
	{
		$this->db->select('*');
		$this->db->from('item');
		$query = $this->db->get();
		return $query->result();
	}

	public function item_detail($product_field,$product_value)
	{
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where($product_field,$product_value);
		$query = $this->db->get();
		return $query->row();
	}
	/* -- #VIEW -- */

	/*-- ACTION --*/
	public function action($type,$value = NULL)
	{
		switch ($type)
		{
			case "create_manual":
			if($this->input->post('product_discount') == 0)
			{
				$product_price_display = strip_tags(str_replace(".", "",$this->input->post('product_price_real')));
			}
			else
			{
				$product_price_real = strip_tags(str_replace(".", "",$this->input->post('product_price_real')));
				$product_price_display = $product_price_real-(($product_price_real*$this->input->post('product_discount'))/100);	
			}
			$data = array(
			'product_code'			=> strip_tags($this->input->post('product_code')),
			'product_title'			=> strip_tags($this->input->post('product_title')),
			'product_url'   		=> strip_tags(strtolower(url_title($this->input->post('product_title')))),
			'product_sku'  			=> strip_tags($this->input->post('product_sku')),
			'product_price_real'	=> strip_tags(str_replace(".", "",$this->input->post('product_price_real'))),
			'product_price_display'	=> $product_price_display,
			'product_price_cost'  	=> strip_tags(str_replace(".", "",$this->input->post('product_price_cost'))),
			'product_discount'  	=> strip_tags($this->input->post('product_discount')),
			'product_weight'  		=> strip_tags($this->input->post('product_weight')),
			'product_height'  		=> strip_tags($this->input->post('product_height')),
			'product_width'  		=> strip_tags($this->input->post('product_width')),
			'product_length'  		=> strip_tags($this->input->post('product_length')),
			'id_store'				=> store_detail(store_used())->id_store,
			'product_created_by' 	=> member()->user_fullname
			);
			$this->db->insert('product',$data);
			break;

			case "create_csv":
			for ($c=0; $c < count($value); $c++)
			{
				if($c != 0)
				{
					$data = array(
					'product_code'			=> rand(),
					'product_title'			=> $value[$c][0],
					'product_url'   		=> strtolower(url_title($value[$c][0])),
					'product_sku'  			=> $value[$c][1],
					'product_price_real'	=> $value[$c][4],
					'product_price_display'	=> $value[$c][4],
					'product_price_cost'  	=> $value[$c][5],
					'product_discount'  	=> $value[$c][6],
					'product_weight'  		=> $value[$c][7],
					'product_height'  		=> $value[$c][8],
					'product_width'  		=> $value[$c][9],
					'product_length'  		=> $value[$c][10],
					'id_store'				=> store_detail(store_used())->id_store,
					'product_created_by' 	=> member()->user_fullname
					);
					$this->db->insert('product',$data);
				}
			}
			break;

			case "delete":
			$array_id = explode(',',$this->input->post('array_id'));
			$this->db->where_in('product_sku',$array_id);
			$this->db->delete('product');
			break;
		}
	}

	public function upload_image($type,$type_code,$image)
	{
		$directory_image = 'assets/'.$type.'/'.$type_code;
		copy($directory_image.'/temp/'.$image,$directory_image.'/'.$image);
	}

	public function assign_category($id_product,$id_category)
	{
		$data = array(
		'id_product'	=> $id_product,
		'id_category'   => $id_category
		);
		$this->db->insert('product_category',$data);
	}

	public function assign_image($id_product)
	{
		$image = explode(".",$this->input->post('product_photo'));
		for ($x = 0; $x <= count($this->input->post('product_photo_total')); $x++)
		{
			if($x == 0)
			{
				$image_product = $this->input->post('product_photo');
			}
			else
			{
				$image_product = $image[0].$x.'.'.$image[1];
			}
			$data = array(
			'image'	=> $image_product,
			'id_product'	=> $id_product,
			);
			$this->db->insert('product_image',$data);
		}
	}
    /*-- #ACTION --*/

	/*-- CHECK --*/
	public function product_title_check()
	{
		$this->db->select('product_title');
		$this->db->from('product');
		$this->db->where('product_title',strip_tags($this->input->post('product_title')));
		$query = $this->db->get();
		if($query->num_rows() < 1)
		{
			return TRUE;
		}
	}
	/*-- #CHECK --*/
}