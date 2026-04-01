<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add New Student</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Inter', sans-serif;
		}
	</style>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
	<div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
		<h2 class="text-2xl font-bold mb-6 text-gray-800 text-center uppercase tracking-wider">Edit Student Info</h2>

		<?php echo form_open('students/update/' . $student['id'], ['class' => 'space-y-4']); ?>

		<div>
			<label class="text-xs font-bold text-gray-400 uppercase">Student Number</label>
			<input type="text" name="student_number" value="<?= $student['student_number'] ?>" required
				class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
		</div>

		<div class="grid grid-cols-2 gap-4">
			<div>
				<label class="text-xs font-bold text-gray-400 uppercase">First Name</label>
				<input type="text" name="first_name" value="<?= $student['first_name'] ?>" required
					class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
			</div>
			<div>
				<label class="text-xs font-bold text-gray-400 uppercase">Last Name</label>
				<input type="text" name="last_name" value="<?= $student['last_name'] ?>" required
					class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
			</div>
		</div>

		<div>
			<label class="text-xs font-bold text-gray-400 uppercase">Email</label>
			<input type="email" name="email" value="<?= $student['email'] ?>" required
				class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
		</div>

		<div>
			<label class="text-xs font-bold text-gray-400 uppercase">Course</label>
			<input type="text" name="course" value="<?= $student['course'] ?>" required
				class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
		</div>

		<button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-md transition">
			Update Changes
		</button>

		<a href="<?= site_url('students') ?>" class="block text-center text-sm text-gray-500 mt-4 hover:underline">Cancel</a>

		<?php echo form_close(); ?>
	</div>
</body>
