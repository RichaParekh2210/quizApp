<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Controller for Start Game */
class Landing extends CI_Controller {

	// for screen 1
	public function index()
	{
		$this->load->view('landing_page');
	}
}
