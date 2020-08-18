<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function category_total($category_field,$category_code)
{
	$CI = get_instance();
    $CI->load->model('model_category');
    $category_total = $CI->model_category->category_total($category_field,$category_code);
    return $category_total;
}
?>