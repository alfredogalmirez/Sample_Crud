<div class="max-w-6xl mx-auto px-4 py-10">
	<div class="flex justify-between items-center mb-8">
		<div>
			<h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $title ?></h1>
			<p class="text-gray-500 mt-1">Manage your student records efficiently.</p>
		</div>
		<div>
			<a href="<?= site_url('students/create') ?>"
				class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200 shadow-sm">
				<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
				</svg>
				Add Student
			</a>
			<a href="<?= site_url('students/sync_k12/1') ?>"
				class="inline-flex items-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold rounded-lg transition shadow-sm">
				<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
				</svg>
				Sync from K-12
			</a>
		</div>
	</div>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 flex items-center shadow-sm rounded-r-lg">
			<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
				<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
			</svg>
			<span class="font-medium"><?= $this->session->flashdata('success'); ?></span>
		</div>
	<?php endif; ?>

	<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
		<table class="min-w-full divide-y divide-gray-200">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Student Details</th>
					<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Course</th>
					<th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
				</tr>
			</thead>
			<tbody class="divide-y divide-gray-100">
				<?php if (!empty($students)): ?>
					<?php foreach ($students as $s): ?>
						<tr class="hover:bg-gray-50 transition duration-150">
							<td class="px-6 py-4">
								<div class="flex flex-col">
									<span class="text-sm font-semibold text-gray-900"><?= $s['first_name'] . ' ' . $s['last_name']; ?></span>
									<span class="text-xs text-gray-400"><?= $s['student_number']; ?> • <?= $s['email']; ?></span>
								</div>
							</td>
							<td class="px-6 py-4 text-center">
								<span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
									<?= $s['course']; ?>
								</span>
							</td>
							<td class="px-6 py-4 text-right text-sm font-medium">
								<div class="flex justify-end space-x-3">
									<a href="<?= site_url('students/edit/' . $s['id']); ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
									<a href="<?= site_url('students/delete/' . $s['id']); ?>"
										onclick="return confirm('Are you sure?')"
										class="text-red-600 hover:text-red-900">Delete</a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="3" class="px-6 py-10 text-center text-gray-400 italic">
							No student records found. Start by adding one!
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="mt-8 flex justify-center items-center pb-10">
		<div class="inline-flex shadow-sm rounded-md">
			<?php echo $links; ?>
		</div>
	</div>
</div>
