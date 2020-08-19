<?php
	class Narocilo_model extends CI_Model
	{
		public function get_cpu()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('cpu');
			return $query->result_array();
		}

		public function get_motherboard()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('motherboard');
			return $query->result_array();
		}

		public function get_graphic()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('graphic');
			return $query->result_array();
		}

		public function get_memory()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('memory');
			return $query->result_array();
		}

		public function get_storage()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('storage');
			return $query->result_array();
		}

		public function get_power()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('power');
			return $query->result_array();
		}

		public function get_pc_case()
		{	
			$this->db->order_by('ime');
			$query = $this->db->get('pc_case');
			return $query->result_array();
		}

	}
?>