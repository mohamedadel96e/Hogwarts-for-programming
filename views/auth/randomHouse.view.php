<?php use Config\Config;?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sorting Ceremony</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <style>
    body {
      background: radial-gradient(circle, rgba(255, 255, 255, 0.7), rgba(0, 0, 0, 0.9));
      box-shadow: inset 0 0 60px rgba(0, 0, 0, 0.4);
      font-family: "Old Standard TT", serif;
    }
  </style>
</head>
<body class="bg-black h-screen flex items-center justify-center">
  <!-- Content -->
  <div class="text-center text-white text-4xl font-bold" id="welcome-message">
    <p>Welcome to Hogwarts!</p>
  </div>

  <div class="p-12 text-center hidden" id="house-card">
    <h2 class="text-4xl text-white font-semibold mb-4 animate-pulse">Your House is </h2>
    <h2 class="text-4xl text-white font-semibold mb-4 animate-pulse"><?= $house ?></h2>
    <br>
    <img src="../../assets/photos/<?= strtolower($house) ?>.png" 
         alt="<?= $house ?> Crest" 
         class="mx-auto h-96 animate-pulse">
    <br>
    <p class="text-2xl text-white mt-4">Starting your journey in...</p>
  </div>

  <script>
    const houseColors = {
      'Gryffindor': 'bg-red-700',
      'Hufflepuff': 'bg-yellow-500',
      'Ravenclaw': 'bg-blue-700',
      'Slytherin': 'bg-green-700'
    };

    const colors = Object.values(houseColors);
    let currentColorIndex = 0;
    let welcomeMessage = document.getElementById('welcome-message');
    let houseCard = document.getElementById('house-card');

    // Color transition effect
    const colorInterval = setInterval(() => {
      document.body.classList.remove(colors[currentColorIndex]);
      currentColorIndex = (currentColorIndex + 1) % colors.length;  
      document.body.classList.add(colors[currentColorIndex]);
    }, 600);

    setTimeout(() => {
      clearInterval(colorInterval);
      // Set final background color based on house
      document.body.classList.remove(...colors);
      document.body.classList.add(houseColors['<?= $house ?>']);
      welcomeMessage.classList.add('hidden');
      houseCard.classList.remove('hidden');
      
      // Redirect to dashboard after 3 seconds
      setTimeout(() => {
        window.location.href = '<?= Config::baseURL ?>/dashboard';
      }, 3000);
    }, 4000);
  </script>
</body>
</html>