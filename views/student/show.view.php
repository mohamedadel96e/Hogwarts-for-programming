<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Record - <?= ($student['name']) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@500&display=swap');

    .hogwarts-font {
      font-family: 'Cormorant SC', serif;
    }
  </style>
</head>

<body class="bg-gray-900 text-gray-100">
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-gray-800 rounded-xl p-8 shadow-2xl border border-amber-600/30">
      <!-- Header Section -->
      <div class="flex justify-between items-start mb-8">
        <div>
          <h1 class="hogwarts-font text-4xl text-amber-400 mb-2">
            <?= ($student['name']) ?>
          </h1>
          <p class="text-gray-400">Student ID: <?= $student['id'] ?></p>
        </div>
        <div class="text-right">
          <span class="inline-block px-4 py-2 rounded-full 
                              <?= strtolower(\Config\Config::HOUSES[$student['house_id']]) === 'Gryffindor' ? 'bg-red-800/40' : (strtolower(\Config\Config::HOUSES[$student['house_id']]) === 'Slytherin' ? 'bg-emerald-800/40' : (strtolower(\Config\Config::HOUSES[$student['house_id']]) === 'Ravenclaw' ? 'bg-blue-800/40' : 'bg-yellow-800/40')) ?>
                              text-amber-400">
            <?= ($student['house_id']) ?>
          </span>
        </div>
      </div>

      <!-- Edit Form -->
      <form method="POST" action="/students" class="space-y-6">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">

        <!-- Form Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-amber-400 mb-2">Full Name</label>
            <input type="text" name="name" required
              value="<?= ($student['name']) ?>"
              class="w-full bg-gray-700 rounded-lg p-3 border border-amber-600/30
                                      focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
          </div>

          <div>
            <label class="block text-amber-400 mb-2">Email Address</label>
            <input type="email" name="email" required
              value="<?= ($student['email']) ?>"
              class="w-full bg-gray-700 rounded-lg p-3 border border-amber-600/30
                                      focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
          </div>

          <div>
            <label class="block text-amber-400 mb-2">Password</label>
            <input value="" type="password" name="password" placeholder="(Only enter to change)"
              class="w-full bg-gray-700 rounded-lg p-3 border border-amber-600/30
                                      focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
          </div>

          <div>
            <label class="block text-amber-400 mb-2">Account Balance</label>
            <input type="number" name="balance" step="0.01" required
              value="<?= ($student['balance']) ?>"
              class="w-full bg-gray-700 rounded-lg p-3 border border-amber-600/30
                                      focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
          </div>

          <div>
            <label class="block text-amber-400 mb-2">Account Status</label>
            <select name="status" required
              class="w-full bg-gray-700 rounded-lg p-3 border border-amber-600/30
                                      focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
              <option value="active" <?= $student['status'] === 'active' ? 'selected' : '' ?>>Active</option>
              <option value="inactive" <?= $student['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
            </select>
          </div>

          <div>
            <label class="block text-amber-400 mb-2">House</label>
            <select name="houseId" required
              class="w-full bg-gray-700 rounded-lg p-3 border border-amber-600/30
                                      focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
              <?php foreach (\Config\Config::HOUSES as $id => $house): ?>
                <option value="<?= $id ?>" class="py-2"><?= $house ?></option>
              <?php endforeach; ?>
            </select>
          </div>

        </div>

        <!-- Form Actions -->
        <div class="flex justify-end gap-4 mt-8">
          <a href="/prof/dashboard/students" class="px-6 py-2 text-gray-300 hover:text-white transition-colors">
            Cancel
          </a>
          <button type="submit"
            class="bg-amber-600 hover:bg-amber-500 text-white px-6 py-2 rounded-lg
                                   transition-all duration-300 transform hover:scale-105">
            Update Student Record
          </button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>