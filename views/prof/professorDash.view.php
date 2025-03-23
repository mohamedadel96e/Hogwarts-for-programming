<?php
include base_path('views/partials/header.php');
include base_path('views/partials/dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Professor.php';

use Models\Professor;
use Models\Course;
$courseModel = new Course();

$professorModel = new Professor();
$professors = $professorModel->getAll();
?>

<main class="p-6">
    <!-- Add Professor Form -->
    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mb-8">
        <div class="flex items-center gap-3 mb-6">
            <h3 class="text-3xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Register New Professor
            </h3>
        </div>
        
        <form method="POST" action="/add-professor" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Name Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Full Name
                </label>
                <input type="text" name="name" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- Email Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email Address
                </label>
                <input type="email" name="email" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- Password Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Password
                </label>
                <input type="password" name="password" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- Submit Button -->
            <div class="lg:col-span-3 mt-6">
                <button type="submit"
                    class="bg-gryffindorRed hover:bg-gryffindorRedDark text-white font-semibold 
                           py-4 px-10 rounded-xl transition-all duration-200 transform hover:scale-[1.02]
                           flex items-center gap-3 shadow-lg hover:shadow-gryffindorRed/20 text-lg w-full justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Register Professor
                </button>
            </div>
        </form>
    </div>

    <!-- Professors Table -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-2xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Faculty Registry
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80 backdrop-blur-sm">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="p-5">ID</th>
                        <th class="p-5">Professor</th>
                        <th class="p-5">Courses</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($professors as $professor): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-5 font-mono text-gray-500">#<?= ($professor['id']) ?></td>
                            <td class="p-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-gryffindorRed/10 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900"><?= ($professor['name']) ?></div>
                                        <div class="text-sm text-gray-500"><?= ($professor['email']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-5">
                                <?php 
                                // Assuming you have a method to get courses by professor
                                $courses = $courseModel->getByProfessor($professor['id']);
                                ?>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach ($courses as $course): ?>
                                        <span class="px-2 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                            <?= ($course['name']) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include base_path('views/partials/footer.php'); ?>