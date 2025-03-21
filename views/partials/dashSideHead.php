<?php
$current_page = basename($_SERVER['REQUEST_URI']);
$menu_items = [
    'students' => '/prof/dashboard/students',
    'professors' => '/prof/dashboard/professors',
    'courses' => '/prof/dashboard/courses',
    'quizzes' => '/prof/dashboard/quizzes',
    'leaderboard' => '/prof/dashboard/leaderboard'
];

function getNavClass($page, $current_page)
{
    return strpos($current_page, $page) !== false
        ? 'bg-gryffindorGold p-3 rounded text-darkRed block font-bold'
        : 'bg-darkRed p-3 rounded text-white block hover:bg-gryffindorGold hover:text-darkRed transition';
}
?>

<body class="flex bg-gray-100 h-screen">
    <aside class="bg-gryffindorRed h-full p-5 text-white w-64 space-y-6">
        <h2 class="text-gryffindorGold text-xl font-semibold">Dashboard</h2>
        <nav>
            <ul class="space-y-4">
                <li>
                    <a href="<?= $menu_items['students'] ?>" class="<?= getNavClass('students', $current_page) ?>">
                        Students
                    </a>
                </li>
                <?php if ($role === 'Chairman'): ?>
                    <li>
                        <a href="<?= $menu_items['professors'] ?>" class="<?= getNavClass('professors', $current_page) ?>">
                            Professors
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?= $menu_items['courses'] ?>" class="<?= getNavClass('courses', $current_page) ?>">
                        Courses
                    </a>
                </li>
                <li>
                    <a href="<?= $menu_items['quizzes'] ?>" class="<?= getNavClass('quizzes', $current_page) ?>">
                        Quizzes
                    </a>
                </li>
                <li>
                    <a href="<?= $menu_items['leaderboard'] ?>"
                        class="<?= getNavClass('leaderboard', $current_page) ?>">
                        Leaderboard
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="flex flex-1 flex-col">
        <header class="flex bg-white justify-between p-4 shadow items-center">
            <h1 class="text-gryffindorRed text-xl font-bold">Welcome to Dashboard</h1>
            <a href="/logout"
                class="bg-darkGold rounded text-white hover:bg-gryffindorGold hover:text-darkRed px-4 py-2 transition">
                Logout
            </a>
        </header>