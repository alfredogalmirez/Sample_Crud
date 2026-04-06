<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Student_model');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('students/index');
		$config['total_rows'] = $this->db->count_all('students');

		$per_page = 10;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data = [
			'students' => $this->Student_model->get_students_paginated($per_page, $page),
			'links' => $this->pagination->create_links(),
			'title' => "Student Lists",
		];

		$this->load->view('layout/header', $data);
		$this->load->view('students/index');
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$data['title'] = "Add Student";

		$this->load->view('layout/header', $data);
		$this->load->view('students/create');
		$this->load->view('layout/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('student_number', 'Student Number', 'required|is_unique[students.student_number]');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[students.email]');
		$this->form_validation->set_rules('course', 'Course', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Student";

			$this->load->view('layout/header', $data);
			$this->load->view('students/create');
			$this->load->view('layout/footer');
		} else {
			$data = array(
				'student_number' => $this->input->post('student_number'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'course' => $this->input->post('course'),
			);

			if ($this->Student_model->insert_student($data)) {
				$this->session->set_flashdata('success', 'Student added successfully!');
				redirect('students');
			} else {
				$this->session->set_flashdata('error', 'Failed to add student.');
				redirect('students/create');
			}
		}
	}

	public function edit($id)
	{
		$data['student'] = $this->Student_model->get_student_by_id($id);
		$data['title'] = "Edit Student";

		$this->load->view('layout/header', $data);
		$this->load->view('students/edit');
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		$data = array(
			'student_number' => $this->input->post('student_number'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'course' => $this->input->post('course'),
		);

		if ($this->Student_model->update_student($id, $data)) {
			$this->session->set_flashdata('success', 'Student updated successfully!');
			redirect('students');
		}
	}

	public function delete($id)
	{
		if ($this->Student_model->delete_student($id)) {
			$this->session->set_flashdata('success', 'Student record deleted.');
			redirect('students');
		}
	}

	public function sync_k12($student_number)
	{
		$url = "https://jsonplaceholder.typicode.com/users/";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($httpCode == 200 && $response) {
			$external_students = json_decode($response, true);
			$import_count = 0;


			foreach ($external_students as $ext) {
				$name_array = explode(' ', $ext['name']);

				$student_data = [
					'student_number' => 'K12-' . rand(10000, 99999),
					'first_name'     => $name_array[0],
					'last_name'      => (isset($name_array[1])) ? $name_array[1] : 'External',
					'email'          => $ext['email'],
					'course'         => 'K-12 Batch Import'
				];

				$this->Student_model->insert_student($student_data);
				$import_count++;
			}

			if ($import_count > 0) {
				$this->session->set_flashdata('success', 'K-12 Data Found and Imported!');
			} else {
				$this->session->set_flashdata('error', 'No new student were added to the database.');
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to connect to the external API Code: ' . $httpCode);
		}
		redirect('students');
	}
}
