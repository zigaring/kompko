<?php
	class Narocila extends CI_Controller
	{
		public function index()
		{
			$data['k_cpu'] = $this->narocilo_model->get_cpu(); //Pridobimo vsak tip komponent
			$data['k_motherboard'] = $this->narocilo_model->get_motherboard();
			$data['k_graphic'] = $this->narocilo_model->get_graphic();
			$data['k_memory'] = $this->narocilo_model->get_memory();
			$data['k_storage'] = $this->narocilo_model->get_storage();
			$data['k_power'] = $this->narocilo_model->get_power();
			$data['k_pc_case'] = $this->narocilo_model->get_pc_case();

			$this->load->view('templates/header');
			$this->load->view('pages/narocilo', $data);
			$this->load->view('templates/footer');
		}



		//*NOT IN USE*
		public function oddaj_narocilo()
		{	
			$narocilo['cpu'] = $this->input->post('cpu');
			$narocilo['motherboard'] = $this->input->post('motherboard');
			$narocilo['graphic'] = $this->input->post('graphic');
			$narocilo['memory'] = $this->input->post('memory');
			$narocilo['storage'] = $this->input->post('storage');
			$narocilo['power'] = $this->input->post('power');
			$narocilo['pc_case'] = $this->input->post('pc_case');
			

			$this->load->view('templates/header');
			$this->load->view('pages/oddaj_narocilo', $narocilo);
			$this->load->view('templates/footer');
		}
	}

?>