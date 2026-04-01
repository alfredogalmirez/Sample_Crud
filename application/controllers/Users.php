<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		return parent::__construct();

		$this->load->helper('form');

		$this->load->helper('url');
	}

	public function create()
	{
		$this->load->view('users/create');
	}
}
