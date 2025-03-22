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
    <!-- Add Student Form -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-gryffindorRed text-lg font-semibold mb-4">Add New Student</h3>
        <form method="POST" action="/add-student" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gryffindorRed focus:ring focus:ring-gryffindorRed focus:ring-opacity-50">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gryffindorRed focus:ring focus:ring-gryffindorRed focus:ring-opacity-50">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gryffindorRed focus:ring focus:ring-gryffindorRed focus:ring-opacity-50">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Initial Balance</label>
                <input type="number" name="balance" step="0.01" value="100.00" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gryffindorRed focus:ring focus:ring-gryffindorRed focus:ring-opacity-50">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">House ID</label>
                <input type="number" name="balance" step="0.01" value="100.00" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gryffindorRed focus:ring focus:ring-gryffindorRed focus:ring-opacity-50">
            </div>

            <div class="md:col-span-4 mt-4">
                <button type="submit"
                    class="bg-gryffindorRed hover:bg-gryffindorRedDark text-white font-semibold py-2 px-4 rounded-md transition-colors">
                    Register Student
                </button>
            </div>
        </form>
    </div>

    <!-- Students Table -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-gryffindorRed text-lg font-semibold mb-4"><?= htmlspecialchars($heading) ?> Management</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">House ID</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">Wand ID</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">Balance</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="py-3 px-4 border text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($students as $student): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border"><?= htmlspecialchars($student['id']) ?></td>
                            <td class="py-3 px-4 border"><?= htmlspecialchars($student['name']) ?></td>
                            <td class="py-3 px-4 border"><?= htmlspecialchars($student['email']) ?></td>
                            <td class="py-3 px-4 border"><?= htmlspecialchars($student['house_id']) ?></td>
                            <td class="py-3 px-4 border"><?= htmlspecialchars($student['wand_id']) ?></td>
                            <td class="py-3 px-4 border"><?= htmlspecialchars($student['balance']) ?></td>
                            <td class="py-3 px-4 border">
                                <span
                                    class="px-2 py-1 text-sm rounded-full <?= $student['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <?= htmlspecialchars($student['status']) ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 border">
                                <button
                                    class="px-3 py-1 text-sm rounded-md font-medium transition-colors <?= $student['status'] === 'active' ? 'bg-red-500 hover:bg-red-600 text-white' : 'bg-green-500 hover:bg-green-600 text-white' ?>">
                                    <?= $student['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include base_path('views/partials/dashSideFoot.php'); ?>
<?php include base_path('views/partials/footer.php'); ?>