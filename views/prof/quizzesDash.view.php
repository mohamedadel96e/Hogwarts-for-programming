<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Quizzes.php';
use Models\Quiz;

$quizzesModel = new Quiz();

$quizzes = $quizzesModel->getAll();
?>


<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-gryffindorRed text-lg font-semibold"><?= $heading ?> Management</h2>
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Course ID</th>
                    <th class="py-2 px-4 border">Prof ID</th>
                    <th class="py-2 px-4 border">Question</th>
                    <th class="py-2 px-4 border">Answer</th>
                    <th class="py-2 px-4 border">Points</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizzes as $quiz): ?>
                    <tr class="text-center">
                        <td class="py-2 px-4 border"><?= htmlspecialchars($quiz['id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($quiz['course_id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($quiz['Professor_id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($quiz['question']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($quiz['answer']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($quiz['points']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

</body>

</html>