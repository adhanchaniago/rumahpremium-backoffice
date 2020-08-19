<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function item_image($id_item)
{
	$CI = get_instance();
    $CI->load->model('model_item');
    $item_image = $CI->model_item->item_image($id_item);
    if($item_image != null)
    {
    	return $item_image;
    }
    else
    {
    	return (object)array('image' => 'no-picture.png');
    }
}
?>