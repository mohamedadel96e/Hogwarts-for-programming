<?php include base_path('views/partials/header.php') ?>
<?php include base_path('views/partials/navbar.php') ?>

<div class="min-h-screen bg-gray-900 py-8">
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

    <!-- Courses Grid -->
    <h3 class="text-2xl font-bold text-amber-400 mb-6">My Courses</h3>
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <?php foreach ($courses as $course): ?>
                <div class="bg-gray-800 rounded-xl p-6 shadow-lg border <?= $user->courses->contains($course->id) ? 'border-green-500' : 'border-red-500' ?>">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-xl font-semibold text-amber-300"><?= $course->name ?></h4>
                        <span class="px-3 py-1 text-sm rounded-full <?= $user->courses->contains($course->id) ? 'bg-green-800/30 text-green-400' : 'bg-red-800/30 text-red-400' ?>">
                            <?= $user->courses->contains($course->id) ? 'Enrolled' : 'Not Enrolled' ?>
                        </span>
                    </div>
                    <p class="text-gray-400 mb-4"><?= $course->description ?? 'No description available' ?></p>
                    <div class="flex items-center text-gray-500">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        <span><?= $course->professor ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div> -->

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

<script>
  function toggleProfile() {
    const profile = document.getElementById('profilePreview');
    profile.classList.toggle('hidden');
  }
</script>

<?php include 'partials/footer.php' ?>