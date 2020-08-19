<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temporary extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function uploadfile($foldername,$foldercode,$filename)
	{
		$path = 'assets/'.$foldername.'/'.$foldercode.'/temp';
		if(!is_dir($path))
		{
			mkdir($path,0755,TRUE);
			$file = 'assets/index.html';
			$file_new = $path.'/index.html';
			copy($file,$file_new);
		}
		$config['file_name'] = $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$config['upload_path'] = $path;
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
			$data = array('upload_data' => $this->upload->data());
		}
	}

	public function uploadmultiplefile($foldername,$foldercode,$filename)
	{
		$path = 'assets/'.$foldername.'/'.$foldercode.'/temp';
		if(!is_dir($path))
		{
			mkdir($path,0755,TRUE);
			$file = 'assets/index.html';
			$file_new = $path.'/index.html';
			copy($file,$file_new);
		}
		$config['file_name'] = $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|msword|vnd.openxmlformats-officedocument.wordprocessingml.document';
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
		}
	}

	public function removefiletemp()
	{
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/temp/'.$this->input->post('file'));
	}

}