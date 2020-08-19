<?php
	class Admin_model extends CI_Model
	{
		public function verify($admin_name, $password) //pridobimo parametre
		{
			$this->db->where('admin_name', $admin_name);  //preverimo 
			$this->db->where('password', $password);

			$result = $this->db->get('admins'); //v katero tabelo gleda

			if($result->num_rows() == 1) //preveri če je natanko 1 admin v bazi
			{
				return $result->row()->id; //vrne natanko 1 rezultat
			}
			else
			{
				return false; //Če je 0 ali več kot 1 = false
			}
		}

		public function get_komponente() //pridobimo vse komponente
		{	
			$this->db->order_by('tip');
			$query = $this->db->get('komponente');
			return $query->result_array(); //vrne array razultatov - Typically used for a foreach loop
		}

		public function get_komponenta($id)
		{
			// $query->db->table('komponente')
			// $this->db->join('komponente', 'komponente.id = cpu.komponente_id');
			// $array = ['komponente.id' => $id, 'cpu.komponente_id' => $id];
			$query = $this->db->get_where('komponente', array('id' => $id));
			return $query->row_array();
		}

		public function komponenta_insert()
		{
			$data1 = array(
				'serijska' => $this->input->post('serial'),
				'tip' => $this->input->post('komponenta'),
				'ime' => $this->input->post('ime'),
				'garancija' =>$this->input->post('garancija')
			);

			$this->db->insert('komponente',$data1); //vstavimo v Komponenta tabelo
			return $this->db->insert_id();  //vrnemo id iz baze (insert_id)
		}


		public function cpu_insert($data2)
		{
			$this->db->insert('cpu', $data2); //vstavimo array v izbrano bazo
		}
		public function motherboard_insert($data2)
		{
			$this->db->insert('motherboard', $data2);
		}
		public function graphic_insert($data2)
		{
			$this->db->insert('graphic', $data2);
		}
		public function memory_insert($data2)
		{
			$this->db->insert('memory', $data2);
		}
		public function storage_insert($data2)
		{
			$this->db->insert('storage', $data2);
		}
		public function power_insert($data2)
		{
			$this->db->insert('power', $data2);
		}
		public function pccase_insert($data2)
		{
			$this->db->insert('pc_case', $data2);
		}

	}

?>