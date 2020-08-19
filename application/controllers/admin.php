<?php
	class Admin extends CI_Controller
	{
		public function index()
		{
			if($this->session->userdata('logged_in')){
				redirect('admin/komponenta_dodaj');  //če je admin že prijavljen - redirect
			}
			$data['title'] = 'Admin Login';

		 	$this->load->view('templates/header');
		 	$this->load->view('admin/login', $data);
		 	$this->load->view('templates/footer');
		}

		public function login()
		{
			$admin_name = $this->input->post('admin'); //pridobimo podatke iz forme
			$password = md5($this->input->post('password'));  //md5 - geslo zakodiramo

			$admin_id = $this->admin_model->verify($admin_name, $password); //preverimo če admin obstaja

			if($admin_id) //če admin obstaja ustvarimo session
			{
				$admin_data = array(
					'admin_id' => $admin_id,
					'admin_name' => $admin_name,
					'logged_in' => true          //true = prijavljen
				);

				$this->session->set_userdata($admin_data); //set session 
				redirect('home');
			}
			else
			{
				redirect('admin');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('admin_id'); //unset session
			$this->session->unset_userdata('admin_name');
			$this->session->unset_userdata('logged_in');

			redirect('home');
		}


		public function komponenta_dodaj()
		{
			if(!$this->session->userdata('logged_in')){ //preveri če je admin prijavljen
				redirect('admin');
			}
			
			$data['komponente'] = $this->admin_model->get_komponente(); //pridobimo komponente

			$this->load->view('templates/header');
		 	$this->load->view('admin/komponenta_dodaj', $data);
		 	$this->load->view('templates/footer');
		 	
		}

		public function komponenta_insert()
		{
			if(!$this->session->userdata('logged_in')){ //preveri če je admin prijavljen
				redirect('admin');
			}

			$this->form_validation->set_rules('serial','Serial','required'); //Pravila forme
			$this->form_validation->set_rules('ime','Ime','required');
			$this->form_validation->set_rules('opis','Opis','required');
			$this->form_validation->set_rules('cena','Cena','required');

			if($this->form_validation->run() === FALSE){
				redirect('admin/komponenta_dodaj'); //če pravila ne ustrezajo, redirect na prazno formo
			}
			else  //Če pravila ustrezajo
			{
			 	$id = $this->admin_model->komponenta_insert(); //vstaimo v Komponente tabelo / Vrnemo id
			 	
			 	$config['upload_path'] = './assets/images/komponente'; //path  //preferences, Default Value=0
				$config['allowed_types'] = 'gif|jpg|png';  //type of file
				$config['max_size'] = '2048';
				$config['max_width'] = '500';
				$config['max_height'] = '500';

				$this->load->library('upload',$config); //load upload library

				if(!$this->upload->do_upload())  //Če slika ni naložena 
						{
							$errors = array('error' => $this->upload->display_errors());
							$post_image = 'noimage.png'; 
						}
					else	//če slika je naložena
						{
							$data = array('upload_data' => $this->upload->data());
							$post_image = $_FILES['userfile']['name'];  //['name']-vzame ime iz forme
						}

			 	if($this->input->post('komponenta') == 'cpu'){ //vstavimo v bazo, glede na izbran select
			 		$data2 = array(
			 			'komponente_id' => $id,  //komponente id
			 			'image' => $post_image,  //image name
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->cpu_insert($data2); //Vstavimo array v izbrano bazo
			 		redirect('admin/komponenta_dodaj');
			 	}

			 	elseif($this->input->post('komponenta') == 'motherboard'){
			 		$data2 = array(
			 			'komponente_id' => $id,
			 			'image' => $post_image,
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->motherboard_insert($data2);
			 		redirect('admin/komponenta_dodaj');
			 	}

			 	elseif($this->input->post('komponenta') == 'graphic'){
			 		$data2 = array(
			 			'komponente_id' => $id,
			 			'image' => $post_image,
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->graphic_insert($data2);
			 		redirect('admin/komponenta_dodaj');
			 	}

			 	elseif($this->input->post('komponenta') == 'memory'){
			 		$data2 = array(
			 			'komponente_id' => $id,
			 			'image' => $post_image,
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->memory_insert($data2);
			 		redirect('admin/komponenta_dodaj');
			 	}

			 	elseif($this->input->post('komponenta') == 'storage'){
			 		$data2 = array(
			 			'komponente_id' => $id,
			 			'image' => $post_image,
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->storage_insert($data2);
			 		redirect('admin/komponenta_dodaj');
			 	}

			 	elseif($this->input->post('komponenta') == 'power'){
			 		$data2 = array(
			 			'komponente_id' => $id,
			 			'image' => $post_image,
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->power_insert($data2);
			 		redirect('admin/komponenta_dodaj');
			 	}

			 	elseif($this->input->post('komponenta') == 'pc_case'){
			 		$data2 = array(
			 			'komponente_id' => $id,
			 			'image' => $post_image,
			 			'ime' => $this->input->post('ime'),
			 			'opis' => $this->input->post('opis'),
			 			'cena' => $this->input->post('cena')
			 		);

			 		$this->admin_model->pccase_insert($data2);
			 		redirect('admin/komponenta_dodaj');
			 	}
		 	}		
		}

		public function komponenta_edit($id)
		{
			if(!$this->session->userdata('logged_in')){
				redirect('admin');
			}

			$data['komponenta'] = $this->admin_model->get_komponenta($id); //dobimo komponento glede na id

			if(empty($data['komponenta'])){ //če ne nejademo - error
				show_404();
			}

			$this->load->view('templates/header');
		 	$this->load->view('admin/komponenta_edit', $data);
		 	$this->load->view('templates/footer');
		}
	}

?> 



