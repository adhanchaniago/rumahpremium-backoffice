<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_image extends CI_Model {

	/* -- ACTION -- */
	public function create_folder($type,$code)
	{
		$path = 'assets/'.$type.'/'.$code;
		if(!is_dir($path))
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
	}

	public function image_manipulate($type,$code,$image)
	{
		for ($x = 0; $x < count($image); $x++)
		{
			$this->model_image->image_process($type,$code,$image[$x]);
		}
	}

	public function image_process($type,$code,$image)
	{
		list($width, $height) = getimagesize('./assets/'.$type.'/'.$code.'/temp/'.$image);

		$source_path = './assets/'.$type.'/'.$code.'/temp/'.$image;
		$thumb_path = './assets/'.$type.'/'.$code.'/thumb';
		$crop_path = './assets/'.$type.'/'.$code.'/crop';

		$this->load->library('image_lib');

		$config['image_library'] = 'gd2';
		$config['source_image'] = $source_path;
		$config['new_image'] = $crop_path;
		$config['overwrite'] = FALSE;
		if($width != $height)
		{
			$config['maintain_ratio'] = FALSE;
			if ($width > $height) {
			    $config['width'] = $height;
			    $config['height'] = $height;
			    $config['x_axis'] = (($width / 2) - ($config['width'] / 2));
			}
			else {
			    $config['height'] = $width;
			    $config['width'] = $width;
			    $config['y_axis'] = (($height / 2) - ($config['height'] / 2));
			}
			$this->image_lib->initialize($config);
			if (!$this->image_lib->crop()) {
				echo $this->image_lib->display_errors();
			}
		}
		else
		{
			$this->image_lib->initialize($config);
			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
			}
		}
		$this->image_lib->clear();

		if($width > 250 || $height > 250)
		{
			$config3['image_library'] = 'gd2';
			$config3['source_image'] = $crop_path.'/'.$image;
			$config3['width'] = 250;
	        $config3['height'] = 250;
	        $config3['new_image'] = $thumb_path;
	        $config3['overwrite'] = FALSE;
	        $config3['create_thumb'] = FALSE;
	        $config3['maintain_ratio'] = TRUE;

			$this->image_lib->initialize($config3);
			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
			}
		}
		else
		{
			copy($source_path,$thumb_path.'/'.$image);
		}

		if($width > 120 || $height > 120)
		{
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $crop_path.'/'.$image;
			$config2['width'] = 120;
	        $config2['height'] = 120;
	        $config2['new_image'] = $crop_path;
	        $config2['overwrite'] = FALSE;
	        $config2['create_thumb'] = FALSE;
	        $config2['maintain_ratio'] = FALSE;

			$this->image_lib->initialize($config2);
			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
			}
			$this->image_lib->clear();
		}

		if($width > 400 || $height > 400)
		{
			$config4['image_library'] = 'gd2';
			$config4['source_image'] = $source_path.'/'.$image;
			$config4['width'] = 400;
	        $config4['height'] = 400;
	        $config4['new_image'] = './assets/'.$type.'/'.$code;
	        $config4['overwrite'] = FALSE;
	        $config4['create_thumb'] = FALSE;
	        $config4['maintain_ratio'] = TRUE;

			$this->image_lib->initialize($config4);
			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
			}
		}
		else
		{
			copy($source_path,'./assets/'.$type.'/'.$code.'/'.$image);
		}
	}

	public function image_remove($type,$file)
	{
		if($type == 'product')
		{
			$this->db->where('image',$file);
			$this->db->delete('product_image');
		}
	}

/*	public function image_product_csv_assign($id_product,$product_code,$image)
	{
		$path = 'assets/product/'.$product_code;
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
		$row_image = explode("|",$image);
		for ($x=0; $x < count($row_image); $x++)
		{
			$image_product = rand().'.jpg';

			$data = array(
			'image'			=> $image_product,
			'id_product'	=> $id_product,
			);
			$this->db->insert('product_image',$data);

			copy($row_image[$x],$path.'/temp/'.$image_product);
			$this->model_image->image_manipulate('product',$product_code,$image_product);
		}
	}*/
    /*-- #ACTION --*/
}