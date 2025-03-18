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
            primary: {
              100: "#E0F2FE",
              200: "#BAE6FD",
              300: "#7DD3FC",
              400: "#38BDF8",
              500: "#0EA5E9",
              600: "#0284C7",
              700: "#0369A1",
              800: "#075985",
              900: "#0C4A6E"
            }
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
  <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
      <img class="w-8 h-8 mr-2"
        src="http://localhost:8001/hogwarts-for-programming/assets/photos/hogwarts.jpg"
        alt="logo">
      Hogwarts School of Magic
    </a>

    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Create New Account
        </h1>

        <form class="space-y-4 md:space-y-6" id="registerForm">
          <div id="errorMessage" class="hidden p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert"></div>

          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Harry Botter" required>
          </div>
          
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="name@house.com" required>
          </div>

          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required minlength="8">
          </div>

          <div>
            <label for="confirmPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required>
          </div>

          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" name="terms" type="checkbox"
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                required>
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                I accept the <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Terms & Conditions</a>
              </label>
            </div>
          </div>

          <button type="submit"
            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Create Account
          </button>

          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account?
            <a href="login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
          </p>
        </form>
      </div>
    </div>
  </section>

  <script>
    // Redirect if already logged in
    if (localStorage.getItem('token')) {
      window.location.href = '/notes';
    }

    document.getElementById('registerForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const errorElement = document.getElementById('errorMessage');
      errorElement.classList.add('hidden');

      try {
        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const termsAccepted = document.getElementById('terms').checked;

        // Client-side validation
        if (!termsAccepted) {
          throw new Error('You must accept the terms and conditions');
        }

        if (password !== confirmPassword) {
          throw new Error('Passwords do not match');
        }

        if (password.length < 8) {
          throw new Error('Password must be at least 8 characters');
        }
        const wandId = 1;
        const houseId = 1;

        // Registration API call
        const registerResponse = await fetch('/hogwarts-for-programming/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            name,
            email,
            password,
            wandId,
            houseId
          })
        });

        if (!registerResponse.ok) {
          const errorData = await registerResponse.json();
          throw new Error(errorData.error || 'Registration failed');
        }

        // Auto-login after successful registration
        const loginResponse = await fetch('/hogwarts-for-programming/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            email,
            password
          })
        });

        if (!loginResponse.ok) {
          throw new Error('Registration successful but login failed');
        }

        // Store token and redirect
        const {
          token
        } = await loginResponse.json();
        localStorage.setItem('token', token);
        window.location.href = '/hogwarts-for-programming/dashboard';

      } catch (error) {
        errorElement.textContent = error.message;
        errorElement.classList.remove('hidden');
        console.error('Registration error:', error);
      }
    });
  </script>
</body>

</html>