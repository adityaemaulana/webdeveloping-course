<?php 
	Class Index extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

		}
		public function index($offset=0)
		{
			$this->load->view('index');
		}
	}
 ?>