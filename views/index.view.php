<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">
    <!-- Hero Section -->
    <div class="relative h-96">
        <img src="../assets/photos/hogwartsLandscape.jpg" alt="Hogwarts Castle" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 font-cinzel">
                    Hogwarts School of Witchcraft and Wizardry
                </h1>
                <p class="text-xl text-amber-300 italic">
                    "Draco Dormiens Nunquam Titillandus"<br>
                    (Never Tickle a Sleeping Dragon)
                </p>
            </div>
        </div>
    </div>

    <!-- Houses Section -->
    <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-white mb-12 font-cinzel">
            The Four Houses of Hogwarts
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Gryffindor -->
            <div class="bg-gradient-to-b from-red-800/30 to-transparent rounded-xl p-6 border-2 border-red-500">
                <div class="text-center">
                    <img src="../assets/photos/gryffindor.png" alt="Gryffindor Crest" class="w-32 mx-auto mb-4">
                    <h3 class="text-2xl font-bold text-red-400 mb-2">Gryffindor</h3>
                    <p class="text-gray-300 mb-4">
                        Founded by Godric Gryffindor<br>
                        <em class="text-amber-300">"Where dwell the brave at heart"</em>
                    </p>
                    <div class="space-y-2 text-left">
                        <p class="text-red-200">Traits: Courage, Bravery, Nerve, Chivalry</p>
                        <p class="text-gray-400">Ghost: Nearly Headless Nick</p>
                        <p class="text-gray-400">Common Room: Gryffindor Tower</p>
                        <p class="text-amber-300 mt-4">Notable Members:</p>
                        <ul class="text-gray-400 list-disc pl-4">
                            <li>Harry Potter</li>
                            <li>Albus Dumbledore</li>
                            <li>Minerva McGonagall</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Slytherin -->
            <div class="bg-gradient-to-b from-emerald-800/30 to-transparent rounded-xl p-6 border-2 border-emerald-500">
                <div class="text-center">
                    <img src="../assets/photos/slytherin.png" alt="Slytherin Crest" class="w-32 mx-auto mb-4">
                    <h3 class="text-2xl font-bold text-emerald-400 mb-2">Slytherin</h3>
                    <p class="text-gray-300 mb-4">
                        Founded by Salazar Slytherin<br>
                        <em class="text-amber-300">"Those cunning folk use any means to achieve their ends"</em>
                    </p>
                    <div class="space-y-2 text-left">
                        <p class="text-emerald-200">Traits: Ambition, Cunning, Leadership, Resourcefulness</p>
                        <p class="text-gray-400">Ghost: The Bloody Baron</p>
                        <p class="text-gray-400">Common Room: Dungeons</p>
                        <p class="text-amber-300 mt-4">Notable Members:</p>
                        <ul class="text-gray-400 list-disc pl-4">
                            <li>Tom Riddle</li>
                            <li>Severus Snape</li>
                            <li>Draco Malfoy</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Ravenclaw -->
            <div class="bg-gradient-to-b from-blue-800/30 to-transparent rounded-xl p-6 border-2 border-blue-500">
                <div class="text-center">
                    <img src="../assets/photos/ravenclaw.png" alt="Ravenclaw Crest" class="w-32 mx-auto mb-4">
                    <h3 class="text-2xl font-bold text-blue-400 mb-2">Ravenclaw</h3>
                    <p class="text-gray-300 mb-4">
                        Founded by Rowena Ravenclaw<br>
                        <em class="text-amber-300">"Wit beyond measure is man's greatest treasure"</em>
                    </p>
                    <div class="space-y-2 text-left">
                        <p class="text-blue-200">Traits: Intelligence, Knowledge, Wisdom, Creativity</p>
                        <p class="text-gray-400">Ghost: The Grey Lady</p>
                        <p class="text-gray-400">Common Room: Ravenclaw Tower</p>
                        <p class="text-amber-300 mt-4">Notable Members:</p>
                        <ul class="text-gray-400 list-disc pl-4">
                            <li>Luna Lovegood</li>
                            <li>Filius Flitwick</li>
                            <li>Sybill Trelawney</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hufflepuff -->
            <div class="bg-gradient-to-b from-yellow-800/30 to-transparent rounded-xl p-6 border-2 border-yellow-500">
                <div class="text-center">
                    <img src="../assets/photos/hufflepuff.png" alt="Hufflepuff Crest" class="w-32 mx-auto mb-4">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-2">Hufflepuff</h3>
                    <p class="text-gray-300 mb-4">
                        Founded by Helga Hufflepuff<br>
                        <em class="text-amber-300">"They are just and loyal, unafraid of toil"</em>
                    </p>
                    <div class="space-y-2 text-left">
                        <p class="text-yellow-200">Traits: Loyalty, Patience, Fair Play, Hard Work</p>
                        <p class="text-gray-400">Ghost: The Fat Friar</p>
                        <p class="text-gray-400">Common Room: Kitchen Corridor</p>
                        <p class="text-amber-300 mt-4">Notable Members:</p>
                        <ul class="text-gray-400 list-disc pl-4">
                            <li>Cedric Diggory</li>
                            <li>Nymphadora Tonks</li>
                            <li>Newt Scamander</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>