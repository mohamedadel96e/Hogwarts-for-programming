<?php include base_path('views/partials/header.php') ?>
<?php include base_path('views/partials/navbar.php') ?>
<div class="flex min-h-screen bg-gray-900">
  <!-- Sticky Sidebar -->
  <?php include base_path('views/partials/sidebar.php') ?>

  <!-- Main Store Content -->
  <div class="flex-1 p-8">
    <!-- Store Header -->
    <div class="mb-12 text-center">
      <p class="mt-4 text-amber-300">Your current gold:
        <span class="text-red-400 font-bold">$<?= ($userDB['balance']) ?></span>
      </p>
    </div>

    <!-- Magical Inventory -->
    <section class="mb-16">
      <h2 class="text-3xl font-magic text-amber-400 mb-8 border-l-4 border-amber-500 pl-4">🪄 Your Magical Inventory</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($inventoryItems as $item): ?>
          <div class="group p-[1.5px] bg-gradient-to-br from-amber-600/40 to-red-700/40 rounded-lg shadow-lg shadow-red-800/30 hover:shadow-amber-700/40 transition-all">
            <div class="bg-gray-900 rounded-lg p-6 h-full">
              <div class="flex items-center mb-4">
                <div class="w-16 h-16 bg-amber-900/20 rounded-lg p-2 mr-4">
                  <img src="<?= ('../../assets' . $item['imagePath']) ?>"
                       alt="<?= ($item['name']) ?>"
                       class="w-full h-full object-contain">
                </div>
                <h3 class="text-xl font-bold bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                  <?= ($item['name']) ?>
                </h3>
              </div>
              <p class="text-gray-300 text-sm mb-4"><?= ($item['category']) ?></p>
              <div class="flex justify-between items-center text-amber-400 text-sm">
                <span>Purchased: <?= date('M Y', strtotime($item['purchased_at'])) ?></span>
                <span class="px-2 py-1 bg-red-900/30 rounded-full">Owned</span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Hogwarts Shop -->
    <section>
      <h2 class="text-3xl font-magic text-amber-400 mb-8 border-l-4 border-amber-500 pl-4">🏰 Hogwarts Shop</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($shopItems as $item): ?>
          <div class="group p-[1.5px] bg-gradient-to-br from-amber-600/40 to-red-700/40 rounded-lg shadow-lg shadow-red-800/30 hover:shadow-amber-700/40 transition-all">
            <div class="bg-gray-900 rounded-lg p-6 h-full flex flex-col">
              <div class="relative mb-4">
                <img src="<?= ('../../assets' . $item['imagePath']) ?>"
                     alt="<?= ($item['name']) ?>"
                     class="w-full h-48 object-cover rounded-lg transform group-hover:scale-105 transition-transform">
                <div class="absolute top-2 right-2 bg-red-800/80 text-amber-300 px-3 py-1 rounded-full text-sm">
                  <?= ($item['price']) ?>
                </div>
              </div>
              <h3 class="text-xl font-bold mb-2 bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                <?= ($item['name']) ?>
              </h3>
              <p class="text-gray-300 text-sm mb-4 flex-1"><?= ($item['category']) ?></p>
              <form action="/shop/purchase" method="post">

                <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                <input type="hidden" name="price" value="<?= $item['price'] ?>">
                <input type="hidden" name="user_id" value="<?= $userDB['id'] ?>">
                <button type="submit" class="w-full bg-gradient-to-r from-red-700 to-amber-600 hover:from-red-600 hover:to-amber-500 text-white
                                    font-semibold py-2 px-4 rounded-lg transform transition-all duration-200 hover:scale-[1.02]
                                    flex items-center justify-center">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                  </svg>
                  Purchase
                </button>
              </form>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </div>
</div>


<?php include base_path('views/partials/footer.php') ?>
