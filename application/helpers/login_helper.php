<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function member()
{
	$CI = get_instance();
    $CI->load->model('model_user');
    $member = $CI->model_user->profile();
    return $member;
}
?>