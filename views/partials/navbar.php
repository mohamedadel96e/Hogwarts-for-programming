<nav class="bg-[#740001] shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <!-- Logo -->
                    <div class="flex items-center py-4">
                        <div href="#" class="flex items-center">
                            <svg class="h-8 w-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span class="ml-2 text-amber-500 font-semibold text-lg">Hogwarts</span>
                        </div>
                    </div>
                    
                    <!-- Primary Nav -->
                    <div class="hidden md:flex items-center space-x-3">
                        
                        <a href="/" class="py-2 px-4 text-amber-100 <?php if($heading == 'Home')  echo 'text-amber-400 bg-red-900'; ?> hover:text-amber-400 hover:bg-red-900 rounded transition duration-300">Home</a>
                        <a href="/about" class="py-2 px-4 text-amber-100 <?php if($heading == 'About')  echo 'text-amber-400 bg-red-900'; ?> hover:text-amber-400 hover:bg-red-900 rounded transition duration-300">About</a>
                        <!-- <a href="#" class="py-2 px-4 text-amber-100 hover:text-amber-400 hover:bg-red-900 rounded transition duration-300">Professors</a> -->
                        <a href="/history" class="py-2 px-4 text-amber-100 <?php if($heading == 'History')  echo 'text-amber-400 bg-red-900'; ?> hover:text-amber-400 hover:bg-red-900 rounded transition duration-300">History</a>
                        <?php if($role == 'student'): ?>
                        <a href="/dashboard" class="py-2 px-4 text-amber-100 <?php if($heading == 'Student Dashboard')  echo 'text-amber-400 bg-red-900'; ?> hover:text-amber-400 hover:bg-red-900 rounded transition duration-300">Dashboard</a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Secondary Nav -->
                 <?php if(!$authenticated): ?>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="/login" class="py-2 px-4 text-amber-100 border border-amber-500 rounded hover:bg-amber-500 hover:text-red-900 transition duration-300">Sign In</a>
                    <a href="/register" class="py-2 px-4 text-red-900 bg-amber-500 rounded hover:bg-amber-400 transition duration-300">Sign Up</a>
                </div>
                <?php else: ?>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="/logout" class="py-2 px-4 text-amber-100 border border-amber-500 rounded hover:bg-amber-500 hover:text-red-900 transition duration-300">Logout</a>
                </div>
                <?php endif; ?>
                
                
                <!-- Mobile Button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg class="h-6 w-6 text-amber-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden bg-red-900">
            <a href="#" class="block py-2 px-4 text-amber-100 hover:bg-red-800">Common Room</a>
            <a href="#" class="block py-2 px-4 text-amber-100 hover:bg-red-800">Notices</a>
            <a href="#" class="block py-2 px-4 text-amber-100 hover:bg-red-800">Quidditch</a>
            <a href="#" class="block py-2 px-4 text-amber-100 hover:bg-red-800">History</a>
            <div class="border-t border-red-700 mt-2 pt-2 pb-2">
                <a href="#" class="block py-2 px-4 text-amber-100 hover:bg-red-800">Sign In</a>
                <a href="#" class="block py-2 px-4 text-amber-100 hover:bg-red-800">Sign Up</a>
            </div>
        </div>
    </nav>

    <script>
        // Mobile menu toggle
        const btn = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('.mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>