<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function store_used()
{
	$CI = get_instance();
    return $CI->session->userdata['commerce_member']['store_code'];
}

function store_detail($store_code)
{
	$CI = get_instance();
    $CI->load->model('model_store');
    $store_detail = $CI->model_store->store_detail($store_code);
    return $store_detail;
}
?>