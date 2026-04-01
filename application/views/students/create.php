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

	<div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-gray-100 p-8">

		<div class="mb-8">
			<a href="<?= site_url('students') ?>" class="text-sm text-blue-600 hover:text-blue-800 flex items-center mb-2 transition">
				<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
				</svg>
				Back to List
			</a>
			<h2 class="text-2xl font-bold text-gray-800">Add Student</h2>
			<p class="text-gray-500 text-sm">Enter the student's personal details below.</p>
		</div>

		<?php echo form_open('students/store', ['class' => 'space-y-5']); ?>

		<div>
			<label class="block text-sm font-semibold text-gray-700 mb-1">Student Number</label>
			<input type="text" name="student_number" placeholder="e.g. 2021-00123-SP-0" required
				class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
		</div>

		<div class="grid grid-cols-2 gap-4">
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">First Name</label>
				<input type="text" name="first_name" placeholder="Juan" required
					class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
			</div>
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Last Name</label>
				<input type="text" name="last_name" placeholder="Dela Cruz" required
					class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
			</div>
		</div>

		<div>
			<label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
			<input type="email" name="email" placeholder="juan@example.com" required
				class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
		</div>

		<div>
			<label class="block text-sm font-semibold text-gray-700 mb-1">Course</label>
			<select name="course" required
				class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white">
				<option value="">Select Course</option>
				<option value="BSIT">BS Information Technology</option>
				<option value="BSCS">BS Computer Science</option>
				<option value="BSIS">BS Information Systems</option>
			</select>
		</div>

		<button type="submit"
			class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition duration-200 transform hover:-translate-y-0.5 active:scale-95 mt-4">
			Save Student Record
		</button>

		<?php echo form_close(); ?>
	</div>

</body>

</html>
