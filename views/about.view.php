<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <!-- Hero Section -->
    <div class="relative h-screen-80 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="../assets/photos/hogwartsLandscape.jpg" class="w-full h-full object-cover opacity-30" alt="Hogwarts Castle">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900"></div>
        </div>
        
        <div class="relative z-10 text-center px-4">
            <div class="floating mb-8">
                <img src="../assets/photos/hogwarts.png" class="w-32 h-32 mx-auto" alt="Hogwarts Crest">
            </div>
            <h1 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-amber-400 via-red-500 to-blue-400 bg-clip-text text-transparent mb-4 font-cinzel">
                About Hogwarts
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                A Legacy of Magical Education Since 990 AD
            </p>
        </div>
    </div>

    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 space-y-20">
        <!-- Founding Section -->
        <div class="magical-border p-1 rounded-2xl">
            <div class="bg-gray-900 rounded-2xl p-8">
                <h2 class="text-3xl font-bold text-amber-400 mb-6 font-cinzel">The Founders</h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <?php foreach(['gryffindor', 'slytherin', 'ravenclaw', 'hufflepuff'] as $house): ?>
                    <div class="group relative bg-gradient-to-b from-<?= $house ?>-500/10 to-transparent p-6 rounded-xl border border-<?= $house ?>-500/30 hover:border-<?= $house ?>-500 transition-all">
                        <div class="text-center">
                            <img src="../assets/photos/<?= $house ?>-founder.png" class="w-32 h-32 mx-auto rounded-full mb-4" alt="<?= ucfirst($house) ?> Founder">
                            <h3 class="text-xl text-<?= $house ?>-500 mb-2 font-cinzel">
                                <?= \Config\Config::FOUNDERS[$house] ?>
                            </h3>
                            <p class="text-gray-400 italic text-sm">
                                "<?= \Config\Config::FOUNDER_QUOTES[$house] ?>"
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- School Information -->
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-3xl font-bold text-amber-400 font-cinzel">A School Like No Other</h2>
                <p class="text-gray-300 leading-relaxed">
                    Nestled in the Scottish Highlands, Hogwarts School of Witchcraft and Wizardry has stood as 
                    the premier institution for magical education for over a millennium. Our castle's ancient 
                    walls hold secrets older than time itself, protected by powerful enchantments and guarded 
                    by magical creatures.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-gray-800 rounded-lg">
                        <p class="text-amber-400 text-xl">4</p>
                        <p class="text-gray-400">Houses</p>
                    </div>
                    <div class="p-4 bg-gray-800 rounded-lg">
                        <p class="text-amber-400 text-xl">1000+</p>
                        <p class="text-gray-400">Years History</p>
                    </div>
                </div>
            </div>
            <div class="relative magical-border p-1 rounded-2xl h-96">
                <div class="bg-gray-900 rounded-2xl h-full bg-cover bg-center" style="background-image: url('../assets/photos/hogwarts-library.jpg')"></div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center py-12">
            <h3 class="text-2xl text-amber-400 mb-8 font-cinzel">Ready to Begin Your Magical Journey?</h3>
            <a href="/register" class="inline-block px-8 py-3 bg-gradient-to-r from-red-700 to-amber-600 hover:from-red-600 hover:to-amber-500 text-white rounded-lg text-lg font-semibold transition-all transform hover:scale-105">
                ✨ Apply Now
            </a>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>