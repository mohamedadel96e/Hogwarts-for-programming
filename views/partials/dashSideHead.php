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


<body class="flex bg-gray-100 min-h-screen">
    <!-- Sticky Sidebar -->
    <aside class="fixed top-0 left-0 h-screen bg-gradient-to-b from-gryffindorRed to-darkRed p-5 text-white w-64 shadow-2xl z-30 border-r-2 border-gryffindorGold">
        <div class="flex flex-col h-full">
            <h2 class="text-gryffindorGold text-2xl font-bold mb-8 pt-4 border-b border-gryffindorGold/30 pb-4">
                <a href="/prof/dashboard" class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    Dashboard
                </a>
            </h2>
            
            <nav class="flex-1">
                <ul class="space-y-2">
                    <li>
                        <a href="<?= $menu_items['students'] ?>" class="<?= getNavClass('students', $current_page) ?> flex items-center p-3 rounded-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Students
                        </a>
                    </li>
                    
                    <?php if ($role === 'Chairman'): ?>
                    <li>
                        <a href="<?= $menu_items['professors'] ?>" class="<?= getNavClass('professors', $current_page) ?> flex items-center p-3 rounded-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Professors
                        </a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?= $menu_items['courses'] ?>" class="<?= getNavClass('courses', $current_page) ?> flex items-center p-3 rounded-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Courses
                        </a>
                    </li>

                    <li>
                        <a href="<?= $menu_items['quizzes'] ?>" class="<?= getNavClass('quizzes', $current_page) ?> flex items-center p-3 rounded-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Quizzes
                        </a>
                    </li>

                    <li>
                        <a href="<?= $menu_items['leaderboard'] ?>" class="<?= getNavClass('leaderboard', $current_page) ?> flex items-center p-3 rounded-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Leaderboard
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex flex-1 flex-col ml-64"> <!-- Added margin-left to account for sidebar width -->
        <!-- Sticky Header -->
        <header class="sticky top-0 bg-white/95 backdrop-blur-sm shadow-sm z-40 border-b border-gray-100">
            <div class="flex justify-between items-center p-4">
                <h1 class="text-gryffindorRed text-2xl font-bold">Welcome to Dashboard</h1>
                <div class="flex flex-row gap-4">
                <a href="/" class=" bg-gryffindorGold hover:bg-gryffindorGold text-white font-semibold py-2 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Go To Home 
                </a>
                <a href="/logout" class="bg-gryffindorGold hover:bg-gryffindorGold text-white font-semibold py-2 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </a>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 p-8 bg-gray-50/50">
            <!-- Your main content here -->
        