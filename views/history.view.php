<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <!-- Hero Section -->
    <div class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="../assets/photos/hogwartsLandscape.jpg" class="w-full h-full object-cover opacity-30" alt="Ancient Hogwarts">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900"></div>
        </div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-amber-400 via-red-500 to-blue-400 bg-clip-text text-transparent mb-4 font-cinzel">
                History of Hogwarts
            </h1>
            <p class="text-xl text-gray-300">Established in the 10th Century</p>
        </div>
    </div>

    <!-- Timeline Section -->
    <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 space-y-20">
        <!-- Founding Era -->
        <div class="magical-border p-1 rounded-2xl">
            <div class="bg-gray-900 rounded-2xl p-8">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/3">
                        <img src="../assets/photos/founding-era.jpg" class="rounded-xl shadow-lg" alt="Founders">
                    </div>
                    <div class="md:w-2/3">
                        <h2 class="text-3xl text-amber-400 mb-4 font-cinzel">The Founding</h2>
                        <div class="space-y-4 text-gray-300">
                            <div class="border-l-4 border-red-500 pl-4">
                                <p class="text-lg">Circa 990 AD</p>
                                <p>Four great witches and wizards establish Hogwarts:</p>
                                <div class="grid grid-cols-2 gap-4 mt-2">
                                    <?php foreach(['gryffindor', 'slytherin', 'ravenclaw', 'hufflepuff'] as $house): ?>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-6 h-6 bg-<?= $house ?>-500 rounded-full"></div>
                                        <span class="text-<?= $house ?>-300"><?= \Config\Config::FOUNDERS[$house] ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <p class="italic text-amber-200">"We'll teach just those whose ancestry's purest..."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historical Events -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Chamber of Secrets -->
            <div class="bg-gray-900 rounded-xl p-6 border-2 border-slytherin-500 hover:border-slytherin-400 transition-colors">
                <div class="text-center mb-4">
                    <span class="text-slytherin-400 text-4xl">🐍</span>
                </div>
                <h3 class="text-xl text-slytherin-300 mb-2 font-cinzel">Chamber of Secrets</h3>
                <p class="text-gray-400 text-sm">Built by Salazar Slytherin in 993 AD</p>
                <p class="text-gray-300 mt-2">"Enemies of the heir... beware!"</p>
            </div>

            <!-- Triwizard Tournament -->
            <div class="bg-gray-900 rounded-xl p-6 border-2 border-gryffindor-500 hover:border-gryffindor-400 transition-colors">
                <div class="text-center mb-4">
                    <span class="text-gryffindor-400 text-4xl">🏆</span>
                </div>
                <h3 class="text-xl text-gryffindor-300 mb-2 font-cinzel">Triwizard Tournament</h3>
                <p class="text-gray-400 text-sm">Established 1294</p>
                <p class="text-gray-300 mt-2">"Three schools, three champions, three tasks"</p>
            </div>

            <!-- Battle of Hogwarts -->
            <div class="bg-gray-900 rounded-xl p-6 border-2 border-red-500 hover:border-red-400 transition-colors">
                <div class="text-center mb-4">
                    <span class="text-red-400 text-4xl">⚔️</span>
                </div>
                <h3 class="text-xl text-red-300 mb-2 font-cinzel">Battle of Hogwarts</h3>
                <p class="text-gray-400 text-sm">May 2, 1998</p>
                <p class="text-gray-300 mt-2">"Not all heroes wear capes... some wear school robes"</p>
            </div>
        </div>

        <!-- Historical Artifacts -->
        <div class="magical-border p-1 rounded-2xl">
            <div class="bg-gray-900 rounded-2xl p-8">
                <h2 class="text-3xl text-amber-400 mb-8 font-cinzel">Magical Artifacts</h2>
                <div class="grid md:grid-cols-4 gap-6">
                    <div class="group relative">
                        <img src="../assets/photos/sorting-hat.png" class="rounded-xl h-48 w-full object-cover" alt="Sorting Hat">
                        <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 transition-colors rounded-xl flex items-center justify-center">
                            <p class="text-amber-400 text-lg font-cinzel opacity-0 group-hover:opacity-100 transition-opacity">
                                "I've never yet been wrong"
                            </p>
                        </div>
                    </div>
                    <!-- Add more artifacts -->
                     
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php include 'partials/footer.php'; ?>