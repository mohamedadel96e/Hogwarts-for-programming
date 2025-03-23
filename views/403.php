<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Creepster&display=swap');

        .main-container {
            background: url("https://aimieclouse.com/Media/Portfolio/Error403Forbidden/HauntedHouseBackground.png") center/contain no-repeat;
            width: 100%;
            height: 60vh;
            max-height: 600px;
            position: relative;
            margin: 0 auto;
        }

        .foregroundimg {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
        }

        .error-code {
            font-family: 'Creepster', cursive;
            color: white;
            font-size: 6em;
            letter-spacing: 0.1em;
            text-shadow: 0 0 10px #FBD130;
        }

        .bat {
            opacity: 0;
            position: absolute;
            transform-origin: center;
            z-index: 3;
        }

        /* Bat animations remain the same */
        /* ... */

        .hogwarts-font {
            font-family: 'Cormorant SC', serif;
            letter-spacing: 0.05em;
        }
    </style>
</head>
<body class="bg-[#000121] min-h-screen overflow-hidden">
    <div class="relative min-h-screen flex flex-col items-center justify-center">
        <!-- Background Elements -->
        <div class="main-container">
            <div class="bat"><!-- Bat 1 --></div>
            <div class="bat"><!-- Bat 2 --></div>
            <div class="bat"><!-- Bat 3 --></div>
            <img class="foregroundimg" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/HauntedHouseForeground.png" alt="haunted house">
        </div>

        <!-- Error Content -->
        <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
            <h1 class="error-code mb-4">ERROR 403</h1>
            
            <div class="hogwarts-font text-2xl text-amber-100 text-bold mb-8 p-4 border border-amber-600/30 rounded-lg bg-gradient-to-br from-red-900/60 to-amber-900/60 text-center">
                <div class="text-4xl mb-2">⚠️</div>
                "This Area Is Forbidden."
            </div>

            <!-- Buttons Container -->
            <div class="flex flex-col sm:flex-row gap-4">
                <?php $previousUri = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/'; ?>
                <a href="<?= $previousUri ?>" class="group relative inline-block">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-800 to-amber-700 rounded-lg blur opacity-30 group-hover:opacity-50 transition duration-200"></div>
                    <button class="relative hogwarts-font bg-[#740001] text-[#D3A625] px-8 py-3 rounded-lg 
                                hover:bg-[#5a0001] transform hover:scale-105 transition-all duration-200
                                flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Return to Safety
                    </button>
                </a>

                <a href="/" class="group relative inline-block">
                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-700 to-red-800 rounded-lg blur opacity-30 group-hover:opacity-50 transition duration-200"></div>
                    <button class="relative hogwarts-font bg-[#740001] text-[#D3A625] px-8 py-3 rounded-lg 
                                hover:bg-[#5a0001] transform hover:scale-105 transition-all duration-200
                                flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Gryffindor Common Room
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>