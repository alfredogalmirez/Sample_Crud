<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?> | Student System</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Inter', sans-serif;
		}
	</style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

	<nav class="bg-blue-700 shadow-lg mb-8">
		<div class="max-w-6xl mx-auto px-4">
			<div class="flex justify-between items-center h-16">
				<div class="flex items-center space-x-2">
					<a href="<?php echo site_url('students'); ?>">
						<span class="text-white font-bold text-xl tracking-tight">EduManager</span>
					</a>
				</div>

				<div class="hidden md:flex items-center space-x-4">
					<a href="<?php echo site_url('students'); ?>"
						class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">
						Student List
					</a>
					<a href="<?php echo site_url('students/create'); ?>"
						class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">
						Add New Student
					</a>
					<a href="<?php echo site_url('students/sync_k12'); ?>"
						class="bg-yellow-400 text-blue-900 px-4 py-2 rounded-md text-sm font-bold hover:bg-yellow-300 transition">
						Sync K-12 Data
					</a>
				</div>
			</div>
		</div>
	</nav>

	<main class="flex-grow py-10 px-4">
