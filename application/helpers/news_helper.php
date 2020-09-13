<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function news_image($id_news)
{
    $CI = get_instance();
    $CI->load->model('model_news');
    $news_image = $CI->model_news->news_image($id_news);
    if($news_image != null)
    {
        return $news_image;
    }
    else
    {
        return (object)array('image' => 'no-picture.png');
    }
}

function news_image_list($id_news)
{
    $CI = get_instance();
    $CI->load->model('model_news');
    $news_image = $CI->model_news->news_image_list($id_news);
    if($news_image != null)
    {
        return $news_image;
    }
    else
    {
        return null;
    }
}

?>