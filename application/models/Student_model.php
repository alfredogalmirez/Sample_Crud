<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * READ: Fetch all students from the table
	 */
	public function get_all_students()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('students');
		return $query->result_array();
	}

	/**
	 * CREATE: Insert a new student record
	 */
	public function insert_student($data)
	{
		return $this->db->insert('students', $data);
	}

	public function get_student_by_id($id)
	{
		return $this->db->get_where('students', array('id' => $id))->row_array();
	}

	public function update_student($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('students', $data);
	}

	public function delete_student($id)
	{
		return $this->db->delete('students', array('id' => $id));
	}

	public function get_students_paginated($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('students');
		return $query->result_array();
	}
}
