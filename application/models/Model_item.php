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
		$this->db->join('user', 'user.id_user = item.item_created_by', 'left');		
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

	public function item_image($id_item)
	{
		$this->db->select('image');
		$this->db->from('item_image');
		$this->db->where('id_item',$id_item);
		$query = $this->db->get();
		return $query->row();
	}

	public function item_image_list($id_item)
	{
		$this->db->select('image');
		$this->db->from('item_image');
		$this->db->where('id_item',$id_item);
		$this->db->order_by('main_image','DESC');
		$query = $this->db->get();
		$array = $query->result_array();
		return array_column($array,'image');
	}
	/* -- #VIEW -- */

	/*-- ACTION --*/
	public function action($type,$value = NULL)
	{
		switch ($type)
		{
			case "create_manual":
			$data = array(
			'item_code'			=> strip_tags($this->input->post('item_code')),
			'title_item'		=> strip_tags($this->input->post('title_item')),
			'title_url'			=> strip_tags(strtolower(url_title($this->input->post('title_item')))),
			'price'				=> str_replace(".","",$this->input->post('price')),
			'type'   			=> strip_tags($this->input->post('type')),
			'category'  		=> strip_tags($this->input->post('category')),
			'category_url'		=> strip_tags(strtolower(url_title($this->input->post('category')))),
			'address'			=> strip_tags($this->input->post('address')),
			'latitude'			=> strip_tags($this->input->post('latitude')),
			'longitude'			=> strip_tags($this->input->post('longitude')),
			'usia_bangunan'		=> strip_tags($this->input->post('usia_bangunan')),
			'lantai'			=> strip_tags($this->input->post('lantai')),
			'luas_bangunan'		=> strip_tags($this->input->post('luas_bangunan')),
			'luas_tanah'		=> strip_tags($this->input->post('luas_tanah')),
			'furnish'			=> strip_tags($this->input->post('furnish')),
			'sertifikat'		=> strip_tags($this->input->post('sertifikat')),
			'listrik'			=> strip_tags($this->input->post('listrik')),
			'sumber_air'		=> strip_tags($this->input->post('sumber_air')),
			'developer'			=> strip_tags($this->input->post('developer')),
			'ac'				=> strip_tags($this->input->post('ac')),
			'kolam_renang'		=> strip_tags($this->input->post('kolam_renang')),
			'halaman'			=> strip_tags($this->input->post('halaman')),
			'water_heater'		=> strip_tags($this->input->post('water_heater')),
			'mesin_cuci'		=> strip_tags($this->input->post('mesin_cuci')),
			'gym'				=> strip_tags($this->input->post('gym')),
			'internet'			=> strip_tags($this->input->post('internet')),
			'teras'				=> strip_tags($this->input->post('teras')),
			'bathup'			=> strip_tags($this->input->post('bathup')),
			'bedroom'  			=> strip_tags($this->input->post('bedroom')),
			'bathroom'  		=> strip_tags($this->input->post('bathroom')),
			'garage'  			=> strip_tags($this->input->post('garage')),
			'description'  		=> $this->input->post('description'),
			'item_created_by' 	=> member()->id_user
			);
			$this->db->insert('item',$data);
			break;

			case "create_csv":
			for ($c=0; $c < count($value); $c++)
			{
				if($c > 2)
				{
					$foldercode = rand();
					$image = rand().'.jpg';

					$data = array(
					'item_code'			=> $foldercode,
					'title_item'		=> $value[$c][0],
					'title_url'			=> strip_tags(strtolower(url_title($value[$c][0]))),
					'price'				=> $value[$c][1],
					'type'   			=> $value[$c][2],
					'category'  		=> strip_tags($this->input->post('category')),
					'category_url'		=> strip_tags(strtolower(url_title($this->input->post('category')))),
					'address'			=> $value[$c][3],
					'latitude'			=> $value[$c][4],
					'longitude'			=> $value[$c][5],
					'usia_bangunan'		=> $value[$c][6],
					'lantai'			=> $value[$c][7],
					'luas_bangunan'		=> $value[$c][8],
					'luas_tanah'		=> $value[$c][9],
					'furnish'			=> $value[$c][10],
					'sertifikat'		=> $value[$c][11],
					'listrik'			=> $value[$c][12],
					'sumber_air'		=> $value[$c][13],
					'developer'			=> $value[$c][14],
					'ac'				=> $value[$c][15],
					'kolam_renang'		=> $value[$c][16],
					'halaman'			=> $value[$c][17],
					'water_heater'		=> $value[$c][18],
					'mesin_cuci'		=> $value[$c][19],
					'gym'				=> $value[$c][20],
					'internet'			=> $value[$c][21],
					'teras'				=> $value[$c][22],
					'bathup'			=> $value[$c][23],
					'bedroom'  			=> $value[$c][24],
					'bathroom'  		=> $value[$c][25],
					'garage'  			=> $value[$c][26],
					'item_created_by' 	=> member()->id_user
					);
					$this->db->insert('item',$data);
					$data = array(
					'id_item'				=> $this->db->insert_id(),
					'image'					=> $image
					);
					$this->db->insert('item_image',$data);
					$path = 'assets/item/'.$foldercode.'/temp';
					if(!is_dir($path))
					{
						mkdir($path,0755,TRUE);
						$file = 'assets/index.html';
						$file_new = $path.'/index.html';
						copy($value[$c][27],$path.'/'.$image);
					}
				}
			}
			break;

			case "delete":
			$array_id = explode(',',$this->input->post('array_id'));
			$this->db->where_in('id_item',$array_id);
			$this->db->delete('item');
			break;
		}
	}

	public function item_image_upload($id_item)
	{
		$data = array(
		'main_image'	=> 0
		);		
		$this->db->where('id_item',$id_item);
		$this->db->where('main_image',1);
		$this->db->update('item_image',$data);

		$image_photo = $this->input->post('image');
		for ($x = 0; $x < count($image_photo); $x++)
		{
			if($image_photo[$x] == $this->input->post('main_image'))
			{
				$main_image = 1;
			}
			else
			{
				$main_image = 0;
			}
			$data = array(
			'image'			=> $image_photo[$x],
			'id_item'		=> $id_item,
			'main_image'	=> $main_image,
			);
			$this->db->insert('item_image',$data);
		}

		$data = array(
		'main_image'	=> 1
		);		
		$this->db->where('image',$this->input->post('main_image'));
		$this->db->update('item_image',$data);
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