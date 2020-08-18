<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function product_image($id_product)
{
	$CI = get_instance();
    $CI->load->model('model_product');
    $product_image = $CI->model_product->product_image($id_product);
    if($product_image != null)
    {
    	return $product_image;
    }
    else
    {
    	return (object)array('image' => 'no-picture.png');
    }
}
?>