<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeding_model extends CI_Model {

	function insert($options = array()) {
		$this->db->insert('sponsor', $options);
	}
	function truncate()
	{
		$this->db->truncate('sponsor');
	}
	function get()
	{
		$query = $this->db->get('sponsor');
		return $query->result();
	}
}