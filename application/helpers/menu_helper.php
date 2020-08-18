<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function menu_top_list()
{
	$CI = get_instance();
    $CI->load->model('model_menu');
    $menu_top_list = $CI->model_menu->menu_top_list();
    return $menu_top_list;
}

function menu_list($id_menu_top)
{
	$CI = get_instance();
    $CI->load->model('model_menu');
    $menu_list = $CI->model_menu->menu_list($id_menu_top);
    return $menu_list;
}

function menu_sub_list($id_menu)
{
	$CI = get_instance();
    $CI->load->model('model_menu');
    $menu_sub_list = $CI->model_menu->menu_sub_list($id_menu);
    return $menu_sub_list;
}
?>