<?php include base_path('views/partials/header.php') ?>
<?php include base_path('views/partials/navbar.php') ?>

<div class=" bg-gray-900 py-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Profile Preview Button -->
    <button onclick="toggleProfile()" class="mb-8 bg-gradient-to-r from-red-700 to-amber-600 hover:from-red-600 hover:to-amber-500 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transform transition-all duration-200 hover:scale-105">
      Show My Profile ✨
    </button>

    <!-- Profile Preview -->
    <div id="profilePreview" class="hidden bg-gray-800 rounded-xl p-6 mb-8 shadow-xl border border-amber-600/30">
      <div class="flex items-center space-x-6">
        <?php if ($user->profilePic): ?>
          <img src="<?= '/uploads/' . $user->profilePic ?>" alt="Student Avatar" class="w-24 h-24 rounded-full border-4 border-amber-500">
        <?php else: ?>
          <img src="<?= '/uploads/default.png' ?>" alt="Student Avatar" class="w-24 h-24 rounded-full border-4 border-amber-500">
        <?php endif; ?>
        <div class="space-y-2">
          <h2 class="text-3xl font-bold text-amber-400"><?= $user->name ?></h2>
          <p class="text-gray-300"><?= \Config\Config::HOUSES[$user->house_id] ?> House</p>
          <div class="flex space-x-4 text-gray-400">
            <span class="flex items-center">
              <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
              </svg>
              <?= $user->email ?>
            </span>
            <span class="flex items-center">

              💵Balance: $<?= $user->balance ?>
            </span>
          </div>
        </div>
        <div class="flex flex-end space-x-4">
          <button onclick="window.location.href='/profile'" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transform transition-all duration-200 hover:scale-105">
            Update Profile
          </button>
          <form action="/profile" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile?');">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transform transition-all duration-200 hover:scale-105">
              Delete Profile
            </button>
          </form>
        </div>
      </div>
    </div>



    <!-- Shop Card -->
    <div class="bg-gradient-to-br from-red-700/30 to-amber-600/30 rounded-xl p-6 shadow-xl border border-amber-600/30 hover:border-amber-500 transition-all duration-300 cursor-pointer" onclick="window.location.href='/shop'">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-2xl font-bold text-amber-300 mb-2">Visit School Shop</h3>
          <p class="text-gray-300">Purchase magical supplies, books, and equipment</p>
        </div>
        <svg class="w-12 h-12 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
      </div>
    </div>
  </div>



                
</div>


<div class="flex bg-gray-900">
    <!--side navbar-->
        <div class="fixed top-0 left-0 w-64 h-full p-[1.5px] bg-gradient-to-b from-amber-600/30 to-red-700/30 shadow-lg shadow-red-800/40">
        <div class="relative h-full bg-gray-900 flex flex-col space-y-6 p-6 overflow-hidden">
            <!-- House Crest Section -->
            <div class="mb-8 pt-4">
                <div class="text-center bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent">
                    <h2 class="text-2xl font-magic font-bold">House Name</h2>
                    <p class="text-sm mt-1 text-amber-400">Portal</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1">
                <ul class="space-y-3">
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
                                999
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
    <div class="w-96"></div>

    <div class="m-8 text-white">
        <h2 class="text-4xl font-bold text-white" id="points">
            My Past Quizzes
        </h2>
        <br>
        <div class="p-[1.5px] bg-gradient-to-r from-amber-600/30 to-red-700/30 rounded-lg shadow-lg shadow-red-800/30">
            <table class="min-w-full table-auto bg-gray-900 border-separate border-spacing-0 rounded-lg backdrop-blur-sm">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-amber-800/20 via-red-900/40 to-amber-800/20">
                    <tr>
                        <th class="px-8 py-4 text-left text-sm font-semibold border-b-2 border-amber-600/40">
                            <span class="bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                                Quiz Name
                            </span>
                        </th>
                        <th class="px-8 py-4 text-center text-sm font-semibold border-b-2 border-amber-600/40">
                            <span class="bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                                Points
                            </span>
                        </th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody class="text-gray-300 divide-y divide-amber-900/30">
                    <tr class="group hover:bg-red-900/10 transition-colors duration-200">
                        <td class="px-8 py-4 text-sm font-medium">
                            <span class="group-hover:text-amber-200 transition-colors">
                                Potion Making #1
                            </span>
                        </td>
                        <td class="px-8 py-4 text-center">
                            <span class="text-sm bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent font-bold">
                                4
                            </span>
                        </td>
                    </tr>
                    
                    <!-- Add more rows as needed -->
                </tbody>
                
                <!-- Optional Table Footer -->
                <tfoot class="bg-gradient-to-r from-amber-800/15 to-red-800/15">
                    <tr>
                        <td class="px-8 py-4 text-sm font-semibold text-amber-400">Total Points</td>
                        <td class="px-8 py-4 text-center text-sm font-semibold text-red-400">124</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <br>
        <h2 class="text-4xl font-bold text-slytherin" id="courses">
            Courses
        </h2>
        <div class="flex flex-wrap justify-center gap-8 m-4">
            <!-- Course Card 1 -->
            <?php if (!empty($courses)): ?>
            <?php foreach ($courses as $course): ?>
            <div class="group p-[2px] bg-gradient-to-r from-amber-600/40 to-red-700/40 rounded-lg shadow-lg shadow-red-800/50 hover:shadow-red-700/60 transition-all duration-300">
                <div class="w-full h-48 sm:w-64 md:w-64 lg:w-80 bg-gray-900 rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xl font-bold bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent">
                            <?= htmlspecialchars($course['course_name']) ?>
                        </h2>
                        <p class="mt-2 font-medium text-amber-400"><?= htmlspecialchars($course['professor_name']) ?></p>
                        <p class="mt-2 font-medium text-amber-400"><?= htmlspecialchars($course['descr']) ?></p>
                        <div class="mt-6">
                            
                        <?php if ($course['stat'] === null): ?>

                            <form method="POST" action="/enroll">
                                    <input type="hidden" name="course_id" 
                                        value="<?= $course['course_id'] ?>">
                                    <input type="hidden" name="enroll" value="1">
                                    <button type="submit" class="enroll-btn">
                                        Enroll Now
                                    </button>
                                </form>
                            <?php else: ?>
                                <div>
                                    Enrolled
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            
            <!-- EOC -->
            
        </div>


        <h2 class="text-4xl font-bold text-white" id="quizzes">
            Available Quizzes
        </h2>
        <div class="flex flex-wrap justify-center gap-8 m-4">
            <!-- Course Card 1 -->
            <div class="group p-[2px] bg-gradient-to-r from-amber-600/40 to-red-700/40 rounded-lg shadow-lg shadow-red-800/50 hover:shadow-red-700/60 transition-all duration-300">
                <div class="w-full h-48 sm:w-64 md:w-64 lg:w-80 bg-gray-900 rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xl font-bold bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent">
                            Potion Making #2
                        </h2>
                        <p class="mt-2 font-medium text-amber-400">Gryffindor</p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-sm bg-gradient-to-r from-amber-600 to-red-700 bg-clip-text text-transparent font-semibold hover:text-amber-500 transition-colors duration-200">
                                Start Quiz
                                <svg class="w-4 h-4 ml-2 text-red-600 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- EOC -->
        </div>

    </div>

</div>

<script>
  function toggleProfile() {
    const profile = document.getElementById('profilePreview');
    profile.classList.toggle('hidden');
  }
</script>

<?php include 'partials/footer.php' ?>