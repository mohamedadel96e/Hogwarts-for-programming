<?php include base_path('views/partials/header.php') ?>
<?php include base_path('views/partials/navbar.php') ?>

<div class="flex min-h-screen bg-gray-900">
    <!-- Sticky Sidebar (Keep existing structure) -->
    <div class="sticky top-16 w-64 h-[calc(100vh-4rem)] p-[1.5px]  from-amber-600/30 to-red-700/30 shadow-lg shadow-red-800/40 z-10">
        <div class="relative h-full bg-gray-900 flex flex-col space-y-6 p-6 overflow-y-auto">
            <!-- House Crest Section -->
            <div class="mb-8 pt-4">
                <div class="text-center bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent">
                    <h2 class="text-2xl font-magic font-bold"><?= \Config\Config::HOUSES[$user->house_id] ?></h2>
                    <p class="text-sm mt-1 text-amber-400">Portal</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1">
                <ul class="space-y-3">
                    <li>
                        <a href="/shop" class="group flex items-center px-4 py-3 text-sm font-medium transition-all duration-300
                            bg-gradient-to-r from-amber-500/0 via-red-600/10 to-amber-500/0
                            hover:from-amber-500/15 hover:via-red-600/20 hover:to-amber-500/15
                            border-l-4 border-transparent hover:border-amber-500">
                            <span class="bg-gradient-to-r from-amber-400 to-red-300 bg-clip-text text-transparent 
                                group-hover:from-amber-300 group-hover:to-red-200 transition-all">
                                    🛒 Shop
                            </span>
                            <div class="ml-auto text-amber-500/80 group-hover:text-amber-400 transition-colors">
                                $<?= $user->balance ?>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#points" class="group flex items-center px-4 py-3 text-sm font-medium transition-all duration-300
                            bg-gradient-to-r from-amber-500/0 via-red-600/10 to-amber-500/0
                            hover:from-amber-500/15 hover:via-red-600/20 hover:to-amber-500/15
                            border-l-4 border-transparent hover:border-amber-500">
                            <span class="bg-gradient-to-r from-amber-400 to-red-300 bg-clip-text text-transparent 
                                group-hover:from-amber-300 group-hover:to-red-200 transition-all">
                                🦁 Points
                            </span>
                            <div class="ml-auto text-amber-500/80 group-hover:text-amber-400 transition-colors">
                                <?= $user->balance ?>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#courses" class="group flex items-center px-4 py-3 text-sm font-medium transition-all duration-300
                            bg-gradient-to-r from-amber-500/0 via-red-600/10 to-amber-500/0
                            hover:from-amber-500/15 hover:via-red-600/20 hover:to-amber-500/15
                            border-l-4 border-transparent hover:border-amber-500">
                            <span class="bg-gradient-to-r from-amber-400 to-red-300 bg-clip-text text-transparent 
                                group-hover:from-amber-300 group-hover:to-red-200 transition-all">
                                📖 Courses
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#quizzes" class="group flex items-center px-4 py-3 text-sm font-medium transition-all duration-300
                            bg-gradient-to-r from-amber-500/0 via-red-600/10 to-amber-500/0
                            hover:from-amber-500/15 hover:via-red-600/20 hover:to-amber-500/15
                            border-l-4 border-transparent hover:border-amber-500">
                            <span class="bg-gradient-to-r from-amber-400 to-red-300 bg-clip-text text-transparent 
                                group-hover:from-amber-300 group-hover:to-red-200 transition-all">
                                ✨ Quizzes
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Divider -->
            <div class="border-t border-amber-900/40"></div>

            <!-- Footer -->
            <div class="text-center text-sm bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent">
                Current Rank: <span class="text-amber-300">1st</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Profile Section -->
        <div class="bg-gray-900 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <button onclick="toggleProfile()" class="mb-8 bg-gradient-to-r from-red-700 to-amber-600 hover:from-red-600 hover:to-amber-500 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transform transition-all duration-200 hover:scale-105">
                    Show My Profile ✨
                </button>

                <!-- Profile Preview -->
                <div id="profilePreview" class="hidden bg-gray-800 rounded-xl p-6 mb-8 shadow-xl border border-amber-600/30 transition-all duration-300">
                    <div class="flex items-center space-x-6">
                        <?php if ($user->profilePic): ?>
                            <img src="<?= '/uploads/' . ($user->profilePic) ?>" alt="Profile" class="w-24 h-24 rounded-full border-4 border-amber-500 object-cover">
                        <?php else: ?>
                            <img src="<?= '/uploads/default.png' ?>" alt="Profile" class="w-24 h-24 rounded-full border-4 border-amber-500">
                        <?php endif; ?>
                        <div class="space-y-2 flex-1">
                            <h2 class="text-3xl font-bold text-amber-400"><?= ($user->name) ?></h2>
                            <p class="text-gray-300"><?= (\Config\Config::HOUSES[$user->house_id]) ?> House</p>
                            <div class="flex flex-wrap gap-4 text-gray-400">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <?= ($user->email) ?>
                                </span>
                                <span class="flex items-center">
                                    💵 Balance: ₲<?= number_format($user->balance, 2) ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <button onclick="window.location.href='/profile'" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transform transition-all duration-200 hover:scale-105">
                                Update Profile
                            </button>
                            <form action="/profile" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transform transition-all duration-200 hover:scale-105">
                                    Delete Profile
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Shop Card -->
                <div  class="bg-gradient-to-br from-red-700/30 to-amber-600/30 rounded-xl p-6 shadow-xl border border-amber-600/30 hover:border-amber-500 transition-all duration-300 cursor-pointer group" onclick="window.location.href='/shop'">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-amber-300 mb-2 group-hover:text-amber-200 transition-colors">Magical Supplies Shop</h3>
                            <p class="text-gray-300 group-hover:text-gray-200 transition-colors">Purchase books, wands, and magical equipment</p>
                        </div>
                        <svg class="w-12 h-12 text-amber-400 group-hover:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Content -->
        <div class="text-white space-y-12">
            <!-- Courses Section -->
            <section id="courses">
                <h2 class="text-4xl font-bold mb-8 bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                    Enrolled Courses
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (!empty($courses)): ?>
        <?php foreach ($courses as $course): ?>
            <div class="group relative bg-gray-800 rounded-xl p-6 shadow-xl border border-amber-600/30 hover:border-amber-500 transition-all duration-300 h-full flex flex-col">
                <div class="flex flex-col gap-4 h-full">
                    <!-- Content Section -->
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-amber-400"><?= ($course['course_name']) ?></h3>
                        <div class="space-y-2 mt-4">
                            <p class="text-gray-300"><?= ($course['descr']) ?></p>
                            <div class="flex items-center gap-2 text-amber-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span><?= ($course['professor_name']) ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Section (Always at bottom) -->
                    <?php if ($course['stat'] === null): ?>
                        <form method="POST" action="/enroll">
                            <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                            <input type="hidden" name="enroll" value="1">
                            <button type="submit" class="w-full bg-gradient-to-r from-amber-600 to-red-700 text-white py-2 px-4 rounded-lg hover:from-amber-500 hover:to-red-600 transition-all duration-200">
                                Enroll Now
                            </button>
                        </form>
                    <?php else: ?>
                        <div class="px-4 py-2 bg-green-800/30 text-green-400 rounded-lg text-center">
                            Enrolled
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-span-full text-center py-12">
            <p class="text-amber-400 text-lg">No courses available for enrollment</p>
        </div>
    <?php endif; ?>
</div>
            </section>

            <!-- Quizzes Section -->
            <section id="quizzes">
                <h2 class="text-4xl font-bold mb-8 bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                    Quiz Challenges
                </h2>

                <!-- Active Quizzes -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-amber-400 mb-6">Available Quizzes</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php if (!empty($quizzes)): ?>
                            <?php foreach ($quizzes as $quiz): ?>
                                <div class="bg-gray-800 rounded-xl p-6 border border-amber-600/30 hover:border-amber-500 transition-all duration-300">
                                    <div class="flex justify-between items-start mb-4">
                                        <h4 class="text-xl font-semibold text-amber-300"><?= ($quiz['name']) ?></h4>
                                        <span class="px-3 py-1 text-sm rounded-full bg-red-800/30 text-red-400">
                                            <?= ($quiz['course_name']) ?>
                                        </span>
                                    </div>
                                    <p class="text-gray-300 mb-4"><?= ($quiz['description']) ?></p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-amber-400">★ <?= $quiz['points'] ?> Points</span>
                                        <a href="/quiz/<?= $quiz['id'] ?>" class="bg-gradient-to-r from-amber-600 to-red-700 text-white py-2 px-4 rounded-lg hover:from-amber-500 hover:to-red-600 transition-all duration-200">
                                            Start Quiz
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-full text-center py-6">
                                <p class="text-amber-400">No quizzes available at the moment</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Past Attempts -->
                <h3 class="text-2xl font-bold text-amber-400 mb-6">Quiz History</h3>
                <div class="p-[1.5px] bg-gradient-to-r from-amber-600/30 to-red-700/30 rounded-xl shadow-xl">
                    <table class="w-full bg-gray-900 rounded-xl backdrop-blur-sm">
                        <thead class="bg-gradient-to-r from-amber-800/20 via-red-900/40 to-amber-800/20">
                            <tr>
                                <th class="px-8 py-4 text-left text-sm font-semibold">
                                    <span class="bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                                        Quiz
                                    </span>
                                </th>
                                <th class="px-8 py-4 text-center text-sm font-semibold">
                                    <span class="bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                                        Score
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300 divide-y divide-amber-900/30">
                            <?php if (!empty($pastQuizzes)): ?>
                                <?php foreach ($pastQuizzes as $attempt): ?>
                                    <tr class="hover:bg-red-900/10 transition-colors duration-200">
                                        <td class="px-8 py-4 text-sm font-medium">
                                            <div class="flex items-center gap-4">
                                                <span class="text-amber-400">★</span>
                                                <?= ($attempt['quiz_name']) ?>
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 text-center">
                                            <span class="text-sm bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent font-bold">
                                                <?= $attempt['score'] ?> pts
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="px-8 py-4 text-center text-amber-400">
                                        No quiz attempts yet
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    function toggleProfile() {
        const profile = document.getElementById('profilePreview');
        profile.classList.toggle('hidden');
        profile.classList.toggle('opacity-0');
        profile.classList.toggle('opacity-100');
    }
</script>

<?php include 'partials/footer.php' ?>