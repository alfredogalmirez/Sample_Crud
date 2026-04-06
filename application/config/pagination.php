<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
