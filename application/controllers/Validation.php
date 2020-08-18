<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*-- INDIVIDUAL --*/
   	public function required()
	{
        $this->form_validation->set_rules('value','required','required');
		if($this->form_validation->run() == TRUE)
		{
            echo'success';
		}
	}

    public function password()
    {
        $this->form_validation->set_rules('value','password','required|min_length[6]');
        if($this->form_validation->run() == TRUE)
        {
            echo'success';
        }
    }
	/*-- #INDIVIDUAL --*/
}