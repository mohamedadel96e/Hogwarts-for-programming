<?php include base_path('views/partials/header.php') ?>
<?php include base_path('views/partials/navbar.php') ?>

<div class="flex min-h-screen bg-gray-900">
    <!-- Sticky Sidebar -->
    <?php include base_path('views/partials/sidebar.php') ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Owl Post Header -->
        <div class="mb-12 text-center">
            <h1 class="text-5xl font-magic bg-gradient-to-r from-amber-400 to-red-500 bg-clip-text text-transparent">
                Owl Post
            </h1>
            <p class="mt-4 text-amber-300">Unread Messages: <span class="text-red-400 font-bold">3</span></p>
        </div>

        <!-- Compose New Message -->
        <div class="p-[1.5px] bg-gradient-to-r from-amber-600/40 to-red-700/40 rounded-lg shadow-lg shadow-red-800/30 mb-12">
            <div class="bg-gray-900 rounded-lg p-6">
                <h2 class="text-3xl font-magic text-amber-400 mb-6">✍️ Compose New Message</h2>
                
                <form class="space-y-6">
                    <div>
                        <label class="block text-amber-300 mb-2">Recipient's Owl:</label>
                        <input type="text" 
                               list="wizards"
                               class="w-full bg-gray-800 border border-amber-600/30 rounded-lg p-3 text-amber-100 
                                      focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                               placeholder="Start typing wizard's name...">
                        <datalist id="wizards">
                            <!-- Populate with real users -->
                            <option value="Harry Potter">
                            <option value="Hermione Granger">
                            <option value="Draco Malfoy">
                        </datalist>
                    </div>

                    <div>
                        <label class="block text-amber-300 mb-2">Subject:</label>
                        <input type="text" 
                               class="w-full bg-gray-800 border border-amber-600/30 rounded-lg p-3 text-amber-100 
                                      focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                               placeholder="Enter message subject...">
                    </div>

                    <div>
                        <label class="block text-amber-300 mb-2">Message:</label>
                        <textarea 
                            class="w-full bg-gray-800 border border-amber-600/30 rounded-lg p-3 text-amber-100 
                                   focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 h-32"
                            placeholder="Write your message on this enchanted parchment..."></textarea>
                    </div>

                    <button class="bg-gradient-to-r from-red-700 to-amber-600 hover:from-red-600 hover:to-amber-500 
                                  text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all 
                                  duration-200 hover:scale-105 flex items-center">
                        🦉 Send Owl
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Inbox Messages -->
        <div class="p-[1.5px] bg-gradient-to-r from-amber-600/40 to-red-700/40 rounded-lg shadow-lg shadow-red-800/30">
            <div class="bg-gray-900 rounded-lg p-6">
                <h2 class="text-3xl font-magic text-amber-400 mb-6">📨 Received Owls</h2>
                
                <!-- Message List -->
                <div class="space-y-4">
                    <!-- Unread Message Example -->
                    <div class="p-4 bg-gradient-to-r from-amber-900/20 to-red-900/10 rounded-lg border-l-4 border-amber-500 
                                hover:bg-red-900/15 transition-colors cursor-pointer">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-amber-400 to-red-400 bg-clip-text text-transparent">
                                    Albus Dumbledore
                                </h3>
                                <p class="text-amber-300 mt-1">Subject: <span class="text-amber-100">Important Notice About Sorcery Lessons</span></p>
                                <p class="text-amber-400/80 mt-2 line-clamp-2">"We are pleased to inform you that you have been accepted at Hogwarts School of Witchcraft..."</p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-amber-400/60">2 hours ago</span>
                                <div class="mt-2 w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Read Message Example -->
                    <div class="p-4 bg-gray-800/20 rounded-lg border-l-4 border-amber-900/40 hover:bg-red-900/15 transition-colors cursor-pointer">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-amber-500">
                                    Minerva McGonagall
                                </h3>
                                <p class="text-amber-300 mt-1">Subject: <span class="text-amber-100">Transfiguration Homework Feedback</span></p>
                                <p class="text-amber-400/80 mt-2 line-clamp-2">"Your recent essay on cross-species transfiguration shows remarkable insight, however..."</p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-amber-400/60">1 day ago</span>
                                <div class="mt-2 w-3 h-3 bg-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php' ?>