<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Background Color Shift</title>
  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"><style>
    body {
      /* Radial Gradient to simulate circular shadow effect */
      background: radial-gradient(circle, rgba(255, 255, 255, 0.7), rgba(0, 0, 0, 0.9));

      /* Apply box-shadow to create the circular shadow effect */
      box-shadow: inset 0 0 60px rgba(0, 0, 0, 0.4); /* inner shadow */
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      transition: background-color 1s ease;

      font-family: "Old Standard TT", serif;
    }

  </style>
</head>
<body class="bg-black h-screen flex items-center justify-center">

  <!-- Content -->
  <div class="text-center text-black text-4xl font-bold" id="welcome-message">
    <p>Welcome to ...</p>
  </div>




  <div class="p-12 text-center hidden" id="house-card">
    <!-- get house name for student, use it for the title and image name-->
    <h2 class="text-4xl text-black font-semibold mb-4">placeholder</h2>
    <br>
    <img src="../../assets/photos/placeholder.png" alt="Placeholder Image" class="mx-auto" style="height: 500px;">
    <!-- -->
    <br>
    <a href="#student-dashboard" class="text-3xl">Start the journey now!</a>
  </div>

  <script>
    // Array of colors to cycle through
    const colors = ['bg-red-700', 'bg-green-700', 'bg-blue-700', 'bg-yellow-700'];
    let currentColorIndex = 0;
    let welcomeMessage = document.getElementById('welcome-message');
    let houseCard = document.getElementById('house-card');

    // Function to change the background color every 3 seconds
    const colorInterval = setInterval(() => {
      document.body.classList.remove(colors[currentColorIndex]);
      currentColorIndex = (currentColorIndex + 1) % colors.length;  
      document.body.classList.add(colors[currentColorIndex]);
    }, 600); // 3000ms = 3 seconds

    setTimeout(() => {
      clearInterval(colorInterval);
      document.body.classList.remove(colors[currentColorIndex]);
      document.body.classList.add('bg-black');
      welcomeMessage.classList.add('hidden');
      houseCard.classList.remove('hidden');
    }, 4000); 


  </script>

</body>
</html>
