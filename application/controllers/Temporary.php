<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temporary extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_image');
    }

	public function uploadfile($foldername,$foldercode,$filename)
	{
		$path = 'assets/'.$foldername.'/'.$foldercode;
		if(!is_dir($path.'/temp'))
		{
			mkdir($path.'/temp',0755,TRUE);
			mkdir($path.'/crop',0755,TRUE);
			mkdir($path.'/thumb',0755,TRUE);
			$file = 'assets/index.html';
			copy($file,$path.'/temp/index.html');
			copy($file,$path.'/crop/index.html');
			copy($file,$path.'/thumb/index.html');
		}
		$config['file_name'] = $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$config['upload_path'] = $path.'/temp';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|msword|vnd.openxmlformats-officedocument.wordprocessingml.document|csv|xls|xlsx|vnd.openxmlformats-officedocument.spreadsheetml.sheet|vnd.ms-excel';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file'))
		{
		    header('HTTP/1.1 500 Internal Server Error');
		    header('Content-type: text/plain');
		}
		else
		{
			$file = $_FILES['file']['tmp_name'];
			list($width, $height) = getimagesize($file);

			$data = array('upload_data' => $this->upload->data());
        	$this->resize_image($foldercode,$filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION),$width,$height);
		}
	}

	public function uploadmultiplefile($foldername,$foldercode)
	{
		$filename = $this->input->post('filename');
		$path = 'assets/'.$foldername.'/'.$foldercode;
		if(!is_dir($path.'/temp'))
		{
			mkdir($path.'/temp',0755,TRUE);
			mkdir($path.'/crop',0755,TRUE);
			mkdir($path.'/thumb',0755,TRUE);
			$file = 'assets/index.html';
			copy($file,$path.'/index.html');
			copy($file,$path.'/temp/index.html');
			copy($file,$path.'/crop/index.html');
			copy($file,$path.'/thumb/index.html');
		}
		$config['file_name'] = $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$config['upload_path'] = $path.'/temp';
		$config['allowed_types'] = 'jpg|jpeg|application/x-jpg|application/jpg|png|pdf|doc|docx|msword|vnd.openxmlformats-officedocument.wordprocessingml.document';
		$config['overwrite'] = FALSE;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file'))
		{
		    header('HTTP/1.1 500 Internal Server Error');
		    header('Content-type: text/plain');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			header('Content-Type: application/json');
			$response = array(
				'filename' => $filename,
				'fileserver' => $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)
			);
			echo json_encode($response);
		}
	}

	public function removefiletemp()
	{
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/temp/'.$this->input->post('file'));
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/crop/'.$this->input->post('file'));
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/thumb/'.$this->input->post('file'));
		$this->model_image->image_remove('product',$this->input->post('file'));
	}
}