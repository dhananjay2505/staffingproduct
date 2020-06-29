<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letsstart extends CI_Controller {

	
	public function index()
	{
		$this->load->view('inc/header');
		$this->load->view('letsstart');
		$this->load->view('inc/footer');
		
	}
}
