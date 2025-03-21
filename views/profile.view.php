
<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 py-12">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <a href="/dashboard" class="mb-6 inline-block bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
      ⮐ Back to Dashboard
    </a>

    <div class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
      <!-- Profile Header -->
      <div class="bg-gradient-to-r from-red-700 to-amber-600 p-6">
        <h1 class="text-3xl font-bold text-white">Magical Profile</h1>
      </div>

      <!-- Profile Form -->
      <form method="POST" action="/profile" method="post" enctype="multipart/form-data" class="p-8">
        <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
          <!-- Profile Photo Upload -->
          <div class="relative group">
            <label for="avatar" class="cursor-pointer">
              <img
                src="<?= $user->profilePic ? 'uploads/' . htmlspecialchars($user->profilePic) : 'default.png' ?>"
                alt="Profile Photo"
                class="w-32 h-32 rounded-full border-4 border-amber-500 hover:opacity-80 transition-opacity">
              <span class="absolute bottom-0 right-0 bg-amber-500 text-white p-2 rounded-full text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                ✏️ Edit
              </span>
            </label>
            <input
              type="file"
              id="avatar"
              name="avatar"
              accept="image/*"
              class="hidden"
              onchange="previewImage(this)">
            <?php if (isset($_SESSION['errors']['avatar'])): ?>
              <p class="text-red-400 text-sm mt-2"><?= $_SESSION['errors']['avatar'] ?></p>
              <?php unset($_SESSION['errors']['avatar']) ?>
            <?php endif; ?>
          </div>

          <!-- Profile Info -->
          <div class="flex-1 space-y-4">
            <!-- Name Input -->
            <div class="space-y-2">
              <label class="text-amber-400">Full Name</label>
              <input
                type="text"
                name="name"
                value="<?= htmlspecialchars($user->name) ?>"
                class="w-full bg-gray-700 text-white px-4 py-2 rounded-md border border-amber-500 focus:border-amber-400 focus:ring-2 focus:ring-amber-400">
              <?php if (isset($_SESSION['errors']['name'])): ?>
                <p class="text-red-400 text-sm"><?= $_SESSION['errors']['name'] ?></p>
                <?php unset($_SESSION['errors']['name']) ?>
              <?php endif; ?>
            </div>

            <!-- House Display -->
            <div class="mt-6 p-6 bg-gray-800 rounded-xl shadow-lg border-2 border-<?= strtolower(\Config\Config::HOUSES[$user->house_id]) ?>-500">
              <div class="flex items-center space-x-6">
                <!-- House Emblem -->
                <div class="relative w-24 h-24 flex-shrink-0">
                  <div class="absolute inset-0 bg-<?= strtolower(\Config\Config::HOUSES[$user->house_id]) ?>-500/20 rounded-full blur-lg"></div>
                  <img
                    src="../assets/photos/<?= strtolower(\Config\Config::HOUSES_PHOTOS[$user->house_id]) ?>"
                    alt="<?= htmlspecialchars(\Config\Config::HOUSES[$user->house_id]) ?> Crest"
                    class="w-24 h-24 rounded-full border-4 border-<?= strtolower(\Config\Config::HOUSES[$user->house_id]) ?>-500">
                </div>

                <!-- House Details -->
                <div class="space-y-2">
                  <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-<?= strtolower(\Config\Config::HOUSES[$user->house_id]) ?>-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <p class="text-<?= strtolower(\Config\Config::HOUSES[$user->house_id]) ?>-400 font-semibold tracking-wider">HOUSE</p>
                  </div>
                  <h3 class="text-2xl font-bold text-white">
                    <?= htmlspecialchars(\Config\Config::HOUSES[$user->house_id]) ?>
                  </h3>
                  <p class="text-gray-400 text-sm mt-2 italic">
                    <?= \Config\Config::HOUSE_MOTTOES[$user->house_id] ?? 'Courage, Wisdom, Loyalty, Ambition' ?>
                  </p>
                </div>
              </div>
            </div>

            <!-- Email Display -->
            <div class="mt-4">
              <p class="text-amber-400">✉️ Email:</p>
              <p class="text-white ml-2"><?= htmlspecialchars($user->email) ?></p>
            </div>

            <button type="submit" class="mt-6 bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
              Save Changes
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function previewImage(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('img').src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<?php include 'partials/footer.php'; ?>