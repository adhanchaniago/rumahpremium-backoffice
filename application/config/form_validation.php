<?php
$config = array(
    'login' => array(
        array(
            'field' => 'user_access',
            'rules' => 'required|callback_member_check'
        ),
        array(
            'field' => 'user_password',
            'rules' => 'required'
        )
    ),
    'register' => array(
        array(
            'field' => 'user_fullname',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'user_email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'user_password',
            'rules' => 'required|min_length[6]'
        )
    ),
    'product_create' => array(
        array(
            'field' => 'product_title',
            'rules' => 'required|callback_product_title_check'
        )
    )
);