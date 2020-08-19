<?php
	class Pages extends CI_Controller
	{
		public function index($page = 'home')  //default = "home" page
		{
			if(!file_exists(APPPATH.'views/pages/'. $page .'.php')) //APPPATH-CI konstant, path to app folder
			{
				show_404();  //if page not found, show 404
			}

			$data['title'] = ucfirst($page);  //data array - variable title name(upper case)

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}

?>