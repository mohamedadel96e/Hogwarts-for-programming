<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gryffindorRed: "#7A0019",
                        gryffindorGold: "#D4AF37",
                        darkRed: "#4B000E",
                        darkGold: "#B8860B"
                    }
                }
            }
        }
    </script>
</head>

<body class="flex bg-gray-100 h-screen">
    <aside class="bg-gryffindorRed h-full p-5 text-white w-64 space-y-6">
        <h2 class="text-gryffindorGold text-xl font-semibold">Dashboard</h2>
        <nav>
            <ul class="space-y-4">
                <li>
                    <a href="/StudentsDash.php" class="bg-gryffindorGold p-3 rounded text-darkRed block font-bold">
                        Students
                    </a>
                </li>
                <li>
                    <a href="../controllers/ProfessorsDash.php"
                        class="bg-darkRed p-3 rounded text-white block hover:bg-gryffindorGold hover:text-darkRed transition">
                        Professors
                    </a>
                </li>
                <li>
                    <a href="/courses"
                        class="bg-darkRed p-3 rounded text-white block hover:bg-gryffindorGold hover:text-darkRed transition">
                        Courses
                    </a>
                </li>
                <li>
                    <a href="/quizzes"
                        class="bg-darkRed p-3 rounded text-white block hover:bg-gryffindorGold hover:text-darkRed transition">
                        Quizzes
                    </a>
                </li>
                <li>
                    <a href="/leaderboard"
                        class="bg-darkRed p-3 rounded text-white block hover:bg-gryffindorGold hover:text-darkRed transition">
                        Leaderboard
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="flex flex-1 flex-col">
        <header class="flex bg-white justify-between p-4 shadow items-center">
            <h1 class="text-gryffindorRed text-xl font-bold">Welcome to Dashboard</h1>
            <a href="logout.html"
                class="bg-darkGold rounded text-white hover:bg-gryffindorGold hover:text-darkRed px-4 py-2 transition">
                Logout
            </a>
        </header>
        <main class="p-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gryffindorRed text-lg font-semibold"><?= $heading ?> Management</h2>
                <p class="text-gray-600 mt-2">This is the Students page content.</p>
            </div>
        </main>
    </div>

</body>

</html>