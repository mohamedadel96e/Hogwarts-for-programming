<?php
include base_path('views/partials/header.php');
include base_path('views/partials/dashSideHead.php');
require_once 'Config/Config.php';
require_once 'models/Professor.php';
use Models\Professor;

$profModel = new Professor();
$professors = $profModel->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_professor'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $profModel->create($name, $email, $password);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_POST['update_professor'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profModel->update($id, $name, $email, $password);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_POST['delete_professor'])) {
        $id = $_POST['id'];
        $profModel->delete($id);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-gryffindorRed text-lg font-semibold">Professor Management</h2>

        <form method="POST" class="mb-4">
            <input type="text" name="name" placeholder="Name" required class="border p-2 rounded">
            <input type="email" name="email" placeholder="Email" required class="border p-2 rounded">
            <input type="password" name="password" placeholder="Password" required class="border p-2 rounded">
            <button type="submit" name="add_professor" class="bg-green-500 text-white px-4 py-2 rounded">Add
                Professor</button>
        </form>

        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">Role</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professors as $professor): ?>
                    <tr class="text-center">
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['id']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['name']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['email']) ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($professor['role']) ?></td>
                        <td class="py-2 px-4 border">
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $professor['id'] ?>">
                                <input type="text" name="name" value="<?= htmlspecialchars($professor['name']) ?>"
                                    class="border p-1 rounded">
                                <input type="email" name="email" value="<?= htmlspecialchars($professor['email']) ?>"
                                    class="border p-1 rounded">
                                <input type="password" name="password" placeholder="New Password"
                                    class="border p-1 rounded">
                                <button type="submit" name="update_professor"
                                    class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
                            </form>
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $professor['id'] ?>">
                                <button type="submit" name="delete_professor"
                                    class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</body>

</html>