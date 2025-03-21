<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Student.php';
use Models\Student;

$studentModel = new Student();

$students = $studentModel->getAll();
?>


<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-gryffindorRed text-lg font-semibold"><?= $heading ?> Management</h2>
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">House ID</th>
                    <th class="py-2 px-4 border">Wand ID</th>
                    <th class="py-2 px-4 border">Balance</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Make Active/Inactive</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr class="text-center">
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['name']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['email']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['house_id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['wand_id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['balance']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($student['status']) ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button
                                class="px-4 py-2 rounded-md font-semibold transition 
                               text-white  <?= ($student['status'] == 'active') ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' ?>">
                                <?= ($student['status'] == 'active') ? 'Deactivate' : 'Activate' ?>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

</body>

</html>