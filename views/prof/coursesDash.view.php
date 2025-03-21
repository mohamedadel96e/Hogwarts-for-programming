<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Courses.php';
use Models\Course;

$coursesModel = new Course();

$courses = $coursesModel->getAll();
?>


<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-gryffindorRed text-lg font-semibold"><?= $heading ?> Management</h2>
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Description</th>
                    <th class="py-2 px-4 border">Prof ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr class="text-center">
                        <td class="py-2 px-4 border"><?= htmlspecialchars($course['id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($course['name']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($course['description']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($course['professor_id']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

</body>

</html>