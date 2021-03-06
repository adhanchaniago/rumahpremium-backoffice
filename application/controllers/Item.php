<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_category');
        $this->load->model('model_item');
        $this->load->model('model_image');
    }

	/* -- TABLE -- */
	public function data()
	{
		$list = $this->model_item->get_datatables();
		$all_data = array();
		$no = $_POST['start'];
		foreach($list as $data)
		{
			$no++;
			$row = array();
			$row[] = $data->id_item;
			$row[] = '<img src="'.base_url().'assets/item/'.$data->item_code.'/temp/'.item_image($data->id_item)->image.'" width="70"><span class="dt-index d-none">'.base_url().'item/form/edit/'.$data->title_url.'/'.strtolower(url_title($data->category)).'<span>';
			$row[] = $data->title_item;
			$row[] = 'Rp '.number_format($data->price,0,'','.');
			$row[] = $data->type;
			$row[] = '<time class="timeago fontsize-small" datetime="'.$data->item_created_date.'" data-toggle="popover" data-content="'.dmy($data->item_created_date).' | '.date('H:i', strtotime($data->item_created_date)).' WIB" data-placement="top" data-trigger="hover"></time><br>oleh <strong>'.$data->user_fullname.'</strong>';
			if($data->item_created_date != $data->item_updated_date)
			{
				$row[] = '<time class="timeago fontsize-small" datetime="'.$data->item_updated_date.'" data-toggle="popover" data-content="'.dmy($data->item_updated_date).'</strong>';
			}
			else
			{
				$row[] = '-';
			}
			$all_data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->model_item->count_all(),
		"recordsFiltered" => $this->model_item->count_filtered(),
		"data" => $all_data,
		);
		echo json_encode($output);
	}
	/* -- #TABLE -- */ 

	/* -- VIEW -- */
	public function category($category)
	{
		$data['basetitle'] = 'Properti';
		$data['subtitle'] = 'Data Properti';
		$data['title'] = $category;
		$data['total_data'] = $this->model_item->count_all();	
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$this->load->view('frame/breadcrumb',$data);
		$this->load->view('item/item-list',$data);
		$this->load->view('frame/footer');
	}

	public function form($type,$value = NULL,$category)
	{
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$data['title'] = $category;
        if($type == 'create')
        {
        	if($value == 'manual')
        	{
        		$this->load->view('item/item-create-manual',$data);
        	}
        	else if($value == 'excel')
        	{
        		$this->load->view('item/item-create-excel',$data);
        	}
        }
        else if($type == 'edit')
        {
        	$data['item_detail'] = $this->model_item->item_detail('title_url',$value,$category);
        	$this->load->view('item/item-edit',$data);
        }
		$this->load->view('frame/footer');
	}
	/* -- #VIEW -- */

	/*-- ACTION --*/
    public function action($type)
    {
        if($type == 'create_manual')
        {
			$this->model_item->action($type);
			$item = $this->model_item->item_detail('item_code',$this->input->post('item_code'));
			if($this->input->post('item_photo_total') != 0)
			{
				$this->model_item->item_image_upload($item->id_item);
				$this->model_image->image_manipulate('item',$this->input->post('item_code'),$this->input->post('image'));
			}
	        redirect('item/category/'.$this->input->post('category'));
        }
        else if($type == 'create_csv')
        {
			$data = array();
			if (($handle = fopen(base_url().'assets/bulk-upload/'.$this->input->post('template_code').'/temp/'.$this->input->post('template_file'),"r")) !== FALSE)
			{
				while (($datacsv = fgetcsv($handle, 1000, ",")) !== FALSE)
				{
					array_push($data,$datacsv);
				}
				fclose($handle);
				$this->model_item->action($type,$data);
			}
			redirect('item/category/'.$this->input->post('category'));
        }
        else if($type == 'delete')
        {
        	$this->model_item->action('delete');
        	redirect('item/category/'.$this->input->post('category'));
        }
    }
	/*-- #ACTION --*/

	/*-- CHECK --*/
    public function product_title_check()
    {
		$check = $this->model_item->product_title_check();
		return $check;
		
    }
	/*-- #CHECK --*/
}