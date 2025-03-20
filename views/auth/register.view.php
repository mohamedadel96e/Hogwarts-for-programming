<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Register Page">
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gryffindor: {
              50: "#fff7ed",
              100: "#ffedd5",
              200: "#fed7aa",
              300: "#fdba74",
              400: "#fb923c",
              500: "#740001", // Main scarlet
              600: "#ea580c",
              700: "#c2410c",
              800: "#9a3412",
              900: "#7c2d12"
            },
            secondary: {
              500: "#eab308" // Gold accent
            }
          }
        }
      }
    }
  </script>

<body class="bg-amber-100 dark:bg-gray-900">
  <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="/" class="flex flex-row items-center mb-6 text-2xl font-semibold text-red-900 dark:text-amber-500">
      <img class="w-16 h-16 mr-2"
        src='./../../assets/photos/hogwarts.png'
        alt="logo">
      Hogwarts School of Magic
    </a>

    <div class="w-full bg-amber-50 rounded-lg shadow-2xl md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 border-2 border-amber-500">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-red-900 md:text-2xl dark:text-amber-500">
          Create New Account
        </h1>

        <form class="space-y-4 md:space-y-6" id="registerForm" action="/register" method="post">
          <div id="errorMessage" class="hidden p-4 text-sm text-red-900 rounded-lg bg-amber-100 dark:bg-gray-800 dark:text-red-400" role="alert"></div>

          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-red-900 dark:text-amber-500">Name</label>
            <input type="text" name="name" id="name"
              class="bg-amber-50 border-2 border-amber-300 text-red-900 text-sm rounded-lg focus:ring-gryffindor-500 focus:border-gryffindor-500 block w-full p-2.5 dark:bg-gray-700 dark:border-amber-500 dark:placeholder-gray-400 dark:text-white"
              placeholder="Harry Botter" required>
          </div>

          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-red-900 dark:text-amber-500">Email</label>
            <input type="email" name="email" id="email"
              class="bg-amber-50 border-2 border-amber-300 text-red-900 text-sm rounded-lg focus:ring-gryffindor-500 focus:border-gryffindor-500 block w-full p-2.5 dark:bg-gray-700 dark:border-amber-500 dark:placeholder-gray-400 dark:text-white"
              placeholder="name@house.com" required>
          </div>

          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-red-900 dark:text-amber-500">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
              class="bg-amber-50 border-2 border-amber-300 text-red-900 text-sm rounded-lg focus:ring-gryffindor-500 focus:border-gryffindor-500 block w-full p-2.5 dark:bg-gray-700 dark:border-amber-500 dark:placeholder-gray-400 dark:text-white"
              required minlength="8">
          </div>

          <div>
            <label for="confirmPassword" class="block mb-2 text-sm font-medium text-red-900 dark:text-amber-500">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="••••••••"
              class="bg-amber-50 border-2 border-amber-300 text-red-900 text-sm rounded-lg focus:ring-gryffindor-500 focus:border-gryffindor-500 block w-full p-2.5 dark:bg-gray-700 dark:border-amber-500 dark:placeholder-gray-400 dark:text-white"
              required>
          </div>

          <?php if (isset($error) && !empty($error)): ?>
            <div class="p-4 mb-4 text-sm text-red-900 rounded-lg bg-amber-100 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul class="list-disc list-inside">
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
              </ul>
            </div>
          <?php endif; ?>

          <button type="submit"
            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800 transition-colors">
            Create Account
          </button>

          <p class="text-sm font-light text-red-900 dark:text-amber-500">
            Already have an account?
            <a href="login" class="font-medium text-red-700 hover:text-red-900 dark:text-amber-500 dark:hover:text-amber-300">Login here</a>
          </p>
        </form>
      </div>
    </div>
  </section>
</body>

</html>