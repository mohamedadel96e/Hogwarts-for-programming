<?php
include base_path('views/partials/header.php');
include base_path('views\partials\dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Profissor.php';
use Models\Professor;

$profModel = new Professor();

$professors = $profModel->getAll();
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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professors as $professor): ?>
                    <tr class="text-center">
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['name']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

</body>

</html>