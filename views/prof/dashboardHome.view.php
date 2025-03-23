<?php
include base_path('views/partials/header.php');
include base_path('views/partials/dashSideHead.php');

use Config\Config;
use Models\Course;
use Models\Quiz;
use Models\Student;
use Models\Professor;

$studentModel = new Student();
$courseModel = new Course();
$quizModel = new Quiz();
$profModel = new Professor();

$students = $studentModel->getAll();
$courses = $courseModel->getAll();
$quizzes = $quizModel->getAll();
$houses = (new \Models\House())->getAll();
?>

<main class="p-6">
  <!-- Dashboard Header -->
  <div class="mb-8 flex items-center justify-between">
    <h1 class="text-3xl font-bold text-gryffindorRed">
      <span class="bg-gradient-to-r from-gryffindorRed to-amber-600 bg-clip-text text-transparent">
        Professor's Dashboard
      </span>
    </h1>
    <div class="flex items-center gap-4">
      <span class="rounded-lg bg-amber-100 px-4 py-2 text-sm font-medium text-darkRed">
        ✨ Current Term: <?= date('F Y') ?>
      </span>
    </div>
  </div>

  <!-- Quick Stats Cards (same as before) -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Students Card -->
    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-gryffindorRed hover:transform hover:scale-[1.02] transition-all">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 mb-1">Registered Students</p>
          <p class="text-3xl font-bold text-darkRed"><?= count($students) ?></p>
        </div>
        <div class="p-3 bg-gryffindorRed/10 rounded-full">
          <!-- Keep existing student icon -->
        </div>
      </div>
    </div>

    <!-- Courses Card -->
    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-blue-600 hover:transform hover:scale-[1.02] transition-all">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 mb-1">Active Courses</p>
          <p class="text-3xl font-bold text-blue-600"><?= count($courses) ?></p>
        </div>
        <div class="p-3 bg-blue-600/10 rounded-full">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Quizzes Card -->
    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-amber-500 hover:transform hover:scale-[1.02] transition-all">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 mb-1">Available Quizzes</p>
          <p class="text-3xl font-bold text-amber-600"><?= count($quizzes) ?></p>
        </div>
        <div class="p-3 bg-amber-500/10 rounded-full">
          <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- House Points Card -->
    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-emerald-600 hover:transform hover:scale-[1.02] transition-all">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 mb-1">Total House Points</p>
          <p class="text-3xl font-bold text-emerald-600">
            <?= array_sum(array_column($houses, 'points')) ?>
          </p>
        </div>
        <div class="p-3 bg-emerald-600/10 rounded-full">
          <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
          </svg>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Content Tabs -->
  <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
    <!-- Tab Navigation -->
    <div class="border-b border-gray-200">
      <nav class="flex space-x-8 px-6" aria-label="Tabs">
        <a href="#students" data-tab="students" class="border-b-2 border-gryffindorRed text-gryffindorRed px-4 py-4 text-sm font-medium">
          Students
        </a>
        <a href="#courses" data-tab="courses" class="text-gray-500 hover:text-gray-700 px-4 py-4 text-sm font-medium">
          Courses
        </a>
        <a href="#quizzes" data-tab="quizzes" class="text-gray-500 hover:text-gray-700 px-4 py-4 text-sm font-medium">
          Quizzes
        </a>
        <a href="#leaderboard" data-tab="leaderboard" class="text-gray-500 hover:text-gray-700 px-4 py-4 text-sm font-medium">
          Leaderboard
        </a>
      </nav>
    </div>

    <!-- Tab Content -->
    <div class="p-6">
      <!-- Students Tab -->
      <div id="students" class="tab-content active">
        <div class="overflow-x-auto rounded-lg border border-gray-100">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">House</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Balance</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php foreach ($students as $student):?>
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 font-medium text-gray-900"><?= ($student['name']) ?></td>
                  <td class="px-6 py-4"><?= ($student['email']) ?></td>
                  <td class="px-6 py-4"><?= Config::HOUSES[$student['house_id']] ?></td>
                  <td class="px-6 py-4"><?= $student['balance'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Courses Tab -->
      <div id="courses" class="tab-content hidden">
        <div class="overflow-x-auto rounded-lg border border-gray-100">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Professor</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quizzes</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Students</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php foreach ($courses as $course):
                $professor = $profModel->get($course['professor_id']);
              ?>
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 font-medium text-gray-900"><?= ($course['name']) ?></td>
                  <td class="px-6 py-4"><?= ($professor['name']) ?></td>
                  <td class="px-6 py-4"><?= count($quizModel->getByCourse($course['id'])) ?></td>
                  <td class="px-6 py-4"><?= count($studentModel->getByCourse($course['id'])) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Quizzes Tab -->
      <div id="quizzes" class="tab-content hidden">
        <div class="overflow-x-auto rounded-lg border border-gray-100">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Question</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Points</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Answer</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php foreach ($quizzes as $quiz):
                $course = $courseModel->get($quiz['course_id']);
              ?>
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 font-medium text-gray-900"><?= ($quiz['question']) ?></td>
                  <td class="px-6 py-4"><?= ($course['name']) ?></td>
                  <td class="px-6 py-4"><?= $quiz['points'] ?></td>
                  <td class="px-6 py-4">
                    <?= $quiz['answer'] ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Leaderboard Tab -->
      <div id="leaderboard" class="tab-content hidden">
        <div class="overflow-x-auto rounded-lg border border-gray-100">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">House</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Points</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Students</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php foreach ($houses as $house): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 font-medium text-gray-900">
                    <span class="text-<?= strtolower($house['name']) ?>-600">
                      <?= ($house['name']) ?>
                    </span>
                  </td>
                  <td class="px-6 py-4"><?= number_format($house['points']) ?></td>
                  <td class="px-6 py-4"><?= count($studentModel->getByHouse($house['id'])) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const tabs = document.querySelectorAll('[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');

    function activateTab(tabId) {
      // Hide all tab contents
      tabContents.forEach(content => {
        content.classList.add('hidden');
        content.classList.remove('active');
      });

      // Remove active class from all tabs
      tabs.forEach(tab => {
        tab.classList.remove('border-gryffindorRed', 'text-gryffindorRed');
        tab.classList.add('text-gray-500');
      });

      // Show selected tab content
      const activeContent = document.getElementById(tabId);
      if (activeContent) {
        activeContent.classList.remove('hidden');
        activeContent.classList.add('active');
      }

      // Activate clicked tab
      const activeTab = document.querySelector(`[data-tab="${tabId}"]`);
      if (activeTab) {
        activeTab.classList.add('border-gryffindorRed', 'text-gryffindorRed');
        activeTab.classList.remove('text-gray-500');
      }
    }

    // Initial active tab
    const initialTab = window.location.hash.substring(1) || 'students';
    activateTab(initialTab);

    // Add click listeners
    tabs.forEach(tab => {
      tab.addEventListener('click', function(e) {
        e.preventDefault();
        const tabId = this.getAttribute('data-tab');
        history.pushState(null, null, `#${tabId}`);
        activateTab(tabId);
      });
    });

    // Handle browser back/forward
    window.addEventListener('popstate', function() {
      const tabId = window.location.hash.substring(1) || 'students';
      activateTab(tabId);
    });
  });
</script>

<?php include base_path('views/partials/footer.php'); ?>