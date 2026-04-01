<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Student_model');

		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('students/index');
		$config['total_rows'] = $this->db->count_all('students');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<nav class="flex space-x-2">';
		$config['full_tag_close'] = '</nav>';
		$config['cur_tag_open'] = '<span class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">';
		$config['num_tag_close'] = '</span>';

		$config['first_link'] = '« First';
		$config['first_tag_open'] = '<span class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 text-gray-600 transition-colors mr-1">';
		$config['first_tag_close'] = '</span>';

		$config['last_link'] = 'Last »';
		$config['last_tag_open'] = '<span class="px-3 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 text-gray-600 transition-colors ml-1">';
		$config['last_tag_close'] = '</span>';

		// Previous Page Link
		$config['prev_link'] = '← Previous';
		$config['prev_tag_open'] = '<span class="px-3 py-2 bg-white border rounded-l-lg hover:bg-gray-50 text-gray-500 cursor-pointer">';
		$config['prev_tag_close'] = '</span>';

		// Next Page Link
		$config['next_link'] = 'Next →';
		$config['next_tag_open'] = '<span class="px-3 py-2 bg-white border rounded-r-lg hover:bg-gray-50 text-gray-500 cursor-pointer">';
		$config['next_tag_close'] = '</span>';

		// Arrow for the "Last" and "First" jump
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['students'] = $this->Student_model->get_students_paginated($config['per_page'], $page);

		$data['links'] = $this->pagination->create_links();
		$data['title'] = "Student List";

		$this->load->view('students/index', $data);
	}

	public function create()
	{
		$this->load->view('students/create');
	}

	public function store()
	{
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
			redirect('student/create');
		}
	}

	public function edit($id)
	{
		$data['student'] = $this->Student_model->get_student_by_id($id);
		$data['title'] = "Edit Student";

		$this->load->view('students/edit', $data);
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

			$this->session->set_flashdata('success', 'K-12 Data Found and Imported!');
		}
		redirect('students');
	}
}
