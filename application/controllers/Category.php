<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_category');
        $this->load->model('model_product');
    }

	/* -- TABLE -- */
	public function data()
	{
		$list = $this->model_category->get_datatables();
		$all_data = array();
		$no = $_POST['start'];
		foreach($list as $data)
		{
			$no++;
			$row = array();
			$row[] = $data->category_code;
			if($data->category_image != '')
			{
				$row[] = '<img src="'.base_url().'assets/category/'.$data->category_code.'/'.$data->category_image.'" width="100"><span class="dt-index d-none">'.base_url().'category/form/edit/'.$data->category_code.'<span>';
			}
			else
			{
				$row[] = '<span class="dt-index d-none">'.base_url().'category/form/edit/'.$data->category_code.'<span>';
			}
			$row[] = $data->category_name;
			if(category_total('id_category',$data->id_category) > 0)
			{
				$row[] = category_total('id_category',$data->id_category).' Item';
			}
			else
			{
				$row[] = '-';
			}
			$row[] = '<time class="timeago fontsize-small" datetime="'.$data->category_created_date.'" data-toggle="popover" data-content="'.dmy($data->category_created_date).' | '.date('H:i', strtotime($data->category_created_date)).' WIB" data-placement="top" data-trigger="hover"></time><br>oleh <strong>'.$data->category_created_by.'</strong>';
			if($data->category_created_date != $data->category_updated_date)
			{
				$row[] = '<time class="timeago fontsize-small" datetime="'.$data->category_updated_date.'" data-toggle="popover" data-content="'.dmy($data->category_updated_date).' | '.date('H:i', strtotime($data->category_updated_date)).' WIB" data-placement="top" data-trigger="hover"></time><br>oleh <strong>'.$data->category_updated_by.'</strong>';
			}
			else
			{
				$row[] = '-';
			}
			$all_data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->model_category->count_all(),
		"recordsFiltered" => $this->model_category->count_filtered(),
		"data" => $all_data,
		);
		echo json_encode($output);
	}
	/* -- #TABLE -- */    

	/*-- VIEW --*/
	public function index()
	{
		$data['basetitle'] = 'Toko Online';
		$data['subtitle'] = 'Kategori';
		$data['title'] = 'Data Kategori';
		$data['total_data'] = $this->model_category->count_all();
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$this->load->view('frame/breadcrumb',$data);
		$this->load->view('category/category-list',$data);
		$this->load->view('frame/footer');
	}

	public function form($type,$value = null)
	{
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$data['product_list'] = $this->model_product->product_list();
        if($type == 'create')
        {
        	$this->load->view('category/category-create',$data);
        }
        else if($type == 'edit')
        {
        	$data['category_detail'] = $this->model_category->category_detail('category_code',$value);
        	$this->load->view('category/category-edit',$data);
        }
		$this->load->view('frame/footer');
	}
	/*-- #VIEW --*/

	/*-- ACTION --*/
    public function action($type)
    {
    	$this->model_category->action($type);
        if($type == 'create')
        {
            if($this->input->post('category_image') != '')
            {
	            $type_code = $this->input->post('category_code');
	            $image = $this->input->post('category_image');
	            $this->model_category->upload_image('category',$type_code,$image);
				$product_code = $this->input->post('product_code');
				$category = $this->model_category->category_detail('category_code',$type_code);
				for ($x = 0; $x < count($product_code); $x++)
				{
					$product = $this->model_product->product_detail('product_code',$product_code[$x]);
					$this->model_product->assign_category($product->id_product,$category->id_category);
				}
	        }
            redirect('category');
        }
        else
        {
        	redirect('category');
        }
    }
	/*-- #ACTION --*/
}