<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
// require_once 'Config/Config.php';
// require_once 'models/Quizzes.php';
use Config\Config;
use Models\Quiz;
use Models\Course;

$courseModel = new Course();

$quizzesModel = new Quiz();

$quizzes = $quizzesModel->getAll();
$courses = $courseModel->getAll();
?>


<main class="p-6">
    <!-- Add Quiz Form -->
    <div class="bg-white p-6 rounded-xl shadow-lg mb-6 border border-gray-100">
        <h3 class="text-2xl font-bold text-gryffindorRed mb-6 flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Create New Quiz
        </h3>
        
        <form method="POST" action="/add-quiz" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Question Input -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Question
                </label>
                <input type="text" name="question" required
                    class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm py-2 px-4 
                           focus:border-gryffindorRed focus:ring-2 focus:ring-gryffindorRed/50 
                           transition-all duration-200 placeholder-gray-400">
            </div>

            <!-- Answer Input -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Correct Answer
                </label>
                <div class="flex items-center gap-4 mt-1">
                    <label class="inline-flex items-center">
                        <input type="radio" name="answer" value="true" required
                            class="form-radio text-gryffindorRed focus:ring-gryffindorRed">
                        <span class="ml-2">True</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="answer" value="false" required
                            class="form-radio text-gryffindorRed focus:ring-gryffindorRed">
                        <span class="ml-2">False</span>
                    </label>
                </div>
            </div>

            <!-- Points Input -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    Points Value
                </label>
                <input type="number" name="points" required
                    class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm py-2 px-4 
                           focus:border-gryffindorRed focus:ring-2 focus:ring-gryffindorRed/50 
                           transition-all duration-200 placeholder-gray-400">
            </div>

            <!-- Course Select -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Associated Course
                </label>
                <select name="course_id" required
                    class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm py-2 px-4 
                           focus:border-gryffindorRed focus:ring-2 focus:ring-gryffindorRed/50 
                           bg-white transition-all duration-200 appearance-none">
                    <?php foreach ($courses as $course): ?>
                        <option value="<?= ($course['id']) ?>" class="py-2">
                            <?= ($course['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="md:col-span-4 mt-4">
                <button type="submit"
                    class="bg-gryffindorRed hover:bg-gryffindorRedDark text-white font-semibold 
                           py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-[1.02]
                           flex items-center gap-2 shadow-lg hover:shadow-gryffindorRed/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Quiz
                </button>
            </div>
        </form>
    </div>

    <!-- Quizzes Table -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-2xl font-bold text-gryffindorRed flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <?= ($heading) ?> Management
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80 backdrop-blur-sm">
                    <tr class="text-left text-sm font-semibold text-gray-700">
                        <th class="p-4">ID</th>
                        <th class="p-4">Course</th>
                        <th class="p-4">Question</th>
                        <th class="p-4">Answer</th>
                        <th class="p-4">Points</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($quizzes as $quiz): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-4 font-medium text-gray-900">#<?= ($quiz['id']) ?></td>
                            <?php $course = $courseModel->get((int)$quiz['course_id']); ?>
                            <td class="p-4 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-md bg-gryffindorRed/10 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gryffindorRed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <?= ($course['name']) ?>
                            </td>
                            <td class="p-4 text-gray-700"><?= ($quiz['question']) ?></td>
                            <td class="p-4">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                    <?= ($quiz['answer'] === 1 ? "True" : "False") ?>
                                </span>
                            </td>
                            <td class="p-4 font-semibold text-gryffindorRed">
                                <?= ($quiz['points']) ?> ✨
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>

</body>

</html>