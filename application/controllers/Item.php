<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_category');
        $this->load->model('model_item');
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
			$row[] = '<img src="'.site().'assets/item/'.$data->photoitem.'" width="70"><span class="dt-index d-none">'.base_url().'item/form/edit/'.$data->title_url.'<span>';
			$row[] = $data->title_item;
			$row[] = 'Rp '.number_format($data->price,0,'','.');
			$row[] = $data->type;
			$row[] = '<time class="timeago fontsize-small" datetime="'.$data->item_created_date.'" data-toggle="popover" data-content="'.dmy($data->item_created_date).' | '.date('H:i', strtotime($data->item_created_date)).' WIB" data-placement="top" data-trigger="hover"></time><br>oleh <strong>'.$data->item_created_by.'</strong>';
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

	public function form($type,$value = NULL)
	{
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		/*$data['category_list'] = $this->model_category->category_list();*/
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
        	$data['item_detail'] = $this->model_item->item_detail('title_url',$value);
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
			if($this->form_validation->run('product_create') == TRUE)
			{
				$this->model_item->action($type);
				$category_code = $this->input->post('category_code');
				$product = $this->model_item->product_detail('product_code',$this->input->post('product_code'));
				for ($x = 0; $x < count($category_code); $x++)
				{
					$category = $this->model_category->category_detail('category_code',$category_code[$x]);
					$this->model_item->assign_category($product->id_product,$category->id_category);
				}
				$this->model_item->assign_image($product->id_product);
	        }
	        redirect('product');
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
			redirect('product');
        }
        else if($type == 'delete')
        {
        	$this->model_item->action('delete');
        	redirect('product');
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