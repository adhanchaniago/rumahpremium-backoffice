<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_news');
        $this->load->model('model_image');
    }

	/* -- TABLE -- */
	public function data()
	{
		$list = $this->model_news->get_datatables();
		$all_data = array();
		$no = $_POST['start'];
		foreach($list as $data)
		{
			$no++;
			$row = array();
			$row[] = $data->id_news;
			$row[] = '<img src="'.base_url().'assets/news/'.$data->news_code.'/temp/'.news_image($data->id_news)->image.'" width="70"><span class="dt-index d-none">'.base_url().'news/form/edit/'.$data->news_url.'<span>';
			$row[] = $data->news_title;
			$row[] = '<time class="timeago fontsize-small" datetime="'.$data->news_created_date.'" data-toggle="popover" data-content="'.dmy($data->news_created_date).' | '.date('H:i', strtotime($data->news_created_date)).' WIB" data-placement="top" data-trigger="hover"></time><br>oleh <strong>'.$data->user_fullname.'</strong>';
			if($data->news_created_date != $data->news_updated_date)
			{
				$row[] = '<time class="timeago fontsize-small" datetime="'.$data->news_updated_date.'" data-toggle="popover" data-content="'.dmy($data->news_updated_date).'</strong>';
			}
			else
			{
				$row[] = '-';
			}
			$all_data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->model_news->count_all(),
		"recordsFiltered" => $this->model_news->count_filtered(),
		"data" => $all_data,
		);
		echo json_encode($output);
	}
	/* -- #TABLE -- */ 

	/* -- VIEW -- */
	public function index()
	{
		$data['basetitle'] = 'Berita';
		$data['subtitle'] = 'Daftar Berita';
		$data['title'] = 'Berita';
		$data['total_data'] = $this->model_news->count_all();	
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$this->load->view('frame/breadcrumb',$data);
		$this->load->view('news/news-list',$data);
		$this->load->view('frame/footer');
	}

	public function form($type,$value = NULL)
	{
		$this->load->view('frame/header');
		$this->load->view('frame/menu');
		$data['title'] = 'Berita';
        if($type == 'create')
        {
        	$this->load->view('news/news-create',$data);
        }
        else if($type == 'edit')
        {
        	$data['news_detail'] = $this->model_news->news_detail('news_url',$value);
        	$this->load->view('news/news-edit',$data);
        }
		$this->load->view('frame/footer');
	}
	/* -- #VIEW -- */

	/*-- ACTION --*/
    public function action($type)
    {
        if($type == 'create')
        {
			$this->model_news->action($type);
			$news = $this->model_news->news_detail('news_code',$this->input->post('news_code'));
			if($this->input->post('news_photo_total') != 0)
			{
				$this->model_news->news_image_upload($news->id_news);
				$this->model_image->image_manipulate('news',$this->input->post('news_code'),$this->input->post('image'));
			}
	        redirect('news');
        }
        else if($type == 'update')
        {
/*			$this->model_news->action($type);
			$news = $this->model_news->news_detail('news_code',$this->input->post('news_code'));
			if($this->input->post('news_photo_total') != 0)
			{
				$this->model_news->news_image_upload($news->id_news);
				$this->model_image->image_manipulate('news',$this->input->post('news_code'),$this->input->post('image'));
			}*/
	        redirect('news');
        }
        else if($type == 'delete')
        {
        	$this->model_news->action('delete');
        	redirect('news');
        }
    }
	/*-- #ACTION --*/
}