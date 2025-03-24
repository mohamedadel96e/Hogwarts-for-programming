<?php
include base_path('views/partials/header.php');
include base_path('views/partials/dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Student.php';

use Models\Student;

$studentModel = new Student();
$students = $studentModel->getAll();
?>

<main class="p-6">
    <!-- Add Student Form -->
    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mb-8">
        <div class="flex items-center gap-3 mb-6">
            <h3 class="text-3xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Enroll New Student
            </h3>
        </div>

        <form method="POST" action="/add-student" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Name Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Email Address
                </label>
                <input type="email" name="email" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- House Select -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    House
                </label>
                <select name="house_id" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           bg-white transition-all duration-200 appearance-none text-lg">
                    <?php foreach (\Config\Config::HOUSES as $id => $house): ?>
                        <option value="<?= $id ?>" class="py-2"><?= $house ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Password Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Password
                </label>
                <input type="password" name="password" required
                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm py-3 px-4 
                           focus:ring-2 focus:ring-gryffindorRed/50 focus:border-gryffindorRed
                           transition-all duration-200 placeholder-gray-400 text-lg">
            </div>

            <!-- Balance Input -->
            <div class="space-y-3">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Initial Balance
                </label>
                <input type="number" name="balance" step="0.01" value="1000.00" required
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Enroll Student
                </button>
            </div>
        </form>
    </div>

    <!-- Students Table -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-2xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Student Registry
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80 backdrop-blur-sm">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="p-5">ID</th>
                        <th class="p-5">Student</th>
                        <th class="p-5">House</th>
                        <th class="p-5">Balance</th>
                        <th class="p-5">Status</th>
                        <th class="p-5">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($students as $student): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-5 font-mono text-gray-500">#<?= ($student['id']) ?></td>
                            <td class="p-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-gryffindorRed/10 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900"><?= ($student['name']) ?></div>
                                        <div class="text-sm text-gray-500"><?= ($student['email']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-5">
                                <?php $houseColor = [
                                    1 => 'text-gryffindorRed',
                                    2 => 'text-hufflepuffYellow',
                                    3 => 'text-ravenclawBlue',
                                    4 => 'text-slytherinGreen'
                                ][$student['house_id']]; ?>
                                <div class="flex items-center gap-2 <?= $houseColor ?>">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <?= (\Config\Config::HOUSES[$student['house_id']]) ?>
                                </div>
                            </td>
                            <td class="p-5 font-semibold text-gryffindorRed">
                                ₲<?= number_format($student['balance'], 2) ?>
                            </td>
                            <td class="p-5">
                                <span class="px-3 py-1.5 rounded-full text-sm font-medium flex items-center gap-2 w-fit <?= $student['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <?php if ($student['status'] === 'active'): ?>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        <?php else: ?>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        <?php endif; ?>
                                    </svg>
                                    <?= (ucfirst($student['status'])) ?>
                                </span>
                            </td>
                            <td class="p-5 flex flex-row gap-2">
                                <!-- Show Button -->
                                <form method="POST" action="/students/show">
                                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                    <button class="flex-1 text-center bg-blue-700 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all duration-200" type="submit">Show</button>
                                </form>

                                <form method="POST" action="/prof/dashboard/students" class="flex">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="status" value="<?= $student['status'] === 'active' ? 'inactive' : 'active' ?>">
                                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                    <button type="submit"
                                        class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 flex items-center gap-2 <?= $student['status'] === 'active' ? 'bg-red-500/10 text-red-600 hover:bg-red-500/20' : 'bg-green-500/10 text-green-600 hover:bg-green-500/20' ?>">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <?= $student['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

