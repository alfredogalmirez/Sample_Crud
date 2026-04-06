<div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8">
	<h2 class="text-2xl font-bold mb-6 text-gray-800 text-center uppercase tracking-wider">Edit Student Info</h2>

	<?php if (validation_errors()): ?>
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>

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
		<label class="block text-sm font-semibold text-gray-700 mb-1">Course</label>
		<select name="course" required
			class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white">
			<option value="">Select Course</option>
			<option value="BSIT" <?= set_select('course', 'BSIT') ?>>BS Information Technology</option>
			<option value="BSCS" <?= set_select('course', 'BSCS') ?>>BS Computer Science</option>
			<option value="BSIS" <?= set_select('course', 'BSIS') ?>>BS Information Systems</option>
		</select>
	</div>

	<button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-md transition">
		Update Changes
	</button>

	<a href="<?= site_url('students') ?>" class="block text-center text-sm text-gray-500 mt-4 hover:underline">Cancel</a>

	<?php echo form_close(); ?>
</div>
