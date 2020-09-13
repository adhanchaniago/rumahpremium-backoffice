<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends CI_Model {

	/* -- TABLE -- */
	var $table = 'news';
	var $column_order = array(null);
	var $column_search = array('news_title');
	var $order = array('id_news' => 'desc');
	
	private function list_news_api()
	{
		$this->db->from('news');
		$this->db->join('user', 'user.id_user = news.news_created_by', 'left');		
		$i = 0;
		foreach ($this->column_search as $news)
		{
			if($_POST['search']['value'])
			{
				if($i===0)
				{
					$this->db->group_start();
					$this->db->like($news, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($news, $_POST['search']['value']);
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
		$this->list_news_api();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->list_news_api();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('news');
		return $this->db->count_all_results();
	}
	/* -- #TABLE -- */

	/* -- VIEW -- */
	public function news_list()
	{
		$this->db->select('*');
		$this->db->from('news');
		$query = $this->db->get();
		return $query->result();
	}

	public function news_detail($news_field,$news_value)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where($news_field,$news_value);
		$query = $this->db->get();
		return $query->row();
	}

	public function news_image($id_news)
	{
		$this->db->select('image');
		$this->db->from('news_image');
		$this->db->where('id_news',$id_news);
		$query = $this->db->get();
		return $query->row();
	}

	public function news_image_list($id_news)
	{
		$this->db->select('image');
		$this->db->from('news_image');
		$this->db->where('id_news',$id_news);
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
			case "create":
			$data = array(
			'news_code'			=> strip_tags($this->input->post('news_code')),
			'news_title'		=> strip_tags($this->input->post('news_title')),
			'news_url'			=> strip_tags(strtolower(url_title($this->input->post('news_title')))),
			'news_content'  	=> $this->input->post('news_content'),
			'news_created_by' 	=> member()->id_user
			);
			$this->db->insert('news',$data);
			break;

			case "delete":
			$array_id = explode(',',$this->input->post('array_id'));
			$this->db->where_in('id_news',$array_id);
			$this->db->delete('news');
			break;
		}
	}

	public function news_image_upload($id_news)
	{
		$data = array(
		'main_image'	=> 0
		);		
		$this->db->where('id_news',$id_news);
		$this->db->where('main_image',1);
		$this->db->update('news_image',$data);

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
			'id_news'		=> $id_news,
			'main_image'	=> $main_image,
			);
			$this->db->insert('news_image',$data);
		}

		$data = array(
		'main_image'	=> 1
		);		
		$this->db->where('image',$this->input->post('main_image'));
		$this->db->update('news_image',$data);
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