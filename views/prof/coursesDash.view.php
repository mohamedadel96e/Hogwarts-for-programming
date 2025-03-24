<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
use Models\Course;
use Models\Professor;
$coursesModel = new Course();
$profModel = new Professor();
$courses = $coursesModel->getAll();
?>

<main class="p-6">
    <!-- Add Course Form -->
    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mb-8">
        <div class="flex items-center gap-3 mb-6">
            <h3 class="text-3xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Create New Course
            </h3>
        </div>
        
        <form method="POST" action="/add-course" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Course Name
                </label>
                <input type="text" name="name" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- Description Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Description
                </label>
                <input type="text" name="description" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- Submit Button -->
            <div class="md:col-span-2 mt-6">
                <button type="submit"
                    class="bg-gryffindorRed hover:bg-gryffindorRedDark text-white font-semibold 
                           py-4 px-10 rounded-xl transition-all duration-200 transform hover:scale-[1.02]
                           flex items-center gap-3 shadow-lg hover:shadow-gryffindorRed/20 text-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Course
                </button>
            </div>
        </form>
    </div>

    <!-- Courses Table -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-2xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <?= ($heading) ?> Registry
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80 backdrop-blur-sm">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="p-5">ID</th>
                        <th class="p-5">Course Name</th>
                        <th class="p-5">Description</th>
                        <th class="p-5">Professor</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($courses as $course): ?>
                        <?php $professor = $profModel->get((int)$course['professor_id']); ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-5 font-mono text-gray-500">#<?= ($course['id']) ?></td>
                            <td class="p-5 font-semibold text-gray-900 flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg bg-gryffindorRed/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <?= ($course['name']) ?>
                            </td>
                            <td class="p-5 text-gray-600 max-w-[400px]">
                                <?= ($course['description']) ?>
                            </td>
                            <td class="p-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gryffindorRed/10 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium"><?= ($professor['name']) ?></span>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>