<div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
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

	<?php if (validation_errors()): ?>
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>

	<?php echo form_open('students/store', ['class' => 'space-y-5']); ?>

	<div>
		<label class="block text-sm font-semibold text-gray-700 mb-1">Student Number</label>
		<input type="text" name="student_number" placeholder="e.g. CL-47683" value="<?= set_value('student_number') ?>" required
			class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
	</div>

	<div class="grid grid-cols-2 gap-4">
		<div>
			<label class="block text-sm font-semibold text-gray-700 mb-1">First Name</label>
			<input type="text" name="first_name" placeholder="Juan" value="<?= set_value('first_name') ?>" required
				class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
		</div>
		<div>
			<label class="block text-sm font-semibold text-gray-700 mb-1">Last Name</label>
			<input type="text" name="last_name" placeholder="Dela Cruz" value="<?= set_value('last_name') ?>" required
				class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
		</div>
	</div>

	<div>
		<label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
		<input type="email" name="email" placeholder="juan@example.com" value="<?= set_value('email') ?>" required
			class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
	</div>

	<div>
		<label class="block text-sm font-semibold text-gray-700 mb-1">Course</label>
		<select name="course" required
			class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white">
			<option value="">Select Course</option>
			<option value="BSIT" <?= set_select('course', 'BSIT') ?>>BS Information Technology</option>
			<option value="BSCS" <?= set_select('course', 'BSCS') ?>>BS Computer Science</option>
			<option value="BSIS" <?= set_select('course', 'BSIS') ?>>BS Information Systems</option>
		</select>
	</div>

	<button type="submit"
		class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition duration-200 transform hover:-translate-y-0.5 active:scale-95 mt-4">
		Save Student Record
	</button>

	<?php echo form_close(); ?>
</div>
