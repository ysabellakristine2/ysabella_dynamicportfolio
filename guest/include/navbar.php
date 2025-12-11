<!--NAVBAR SECTION-->
    <nav class="bg-gray-400 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            
            <!-- Right side of navbar / logo-->
            <span class="mr-auto">
                <a id="logo-secret" href="#" class="flex items-center space-x-2">
                    
                <img src="images/favicon.png" alt="Logo" class="h-10 inline object-contain">
                    <span class="text-lg font-semibold text-gray-800 hover:text-cyan-200 transition ease-in-out duration-700">Ysabella Kristine Romero</span>
                </a>
            </span>

            <!-- hamberger icon for mobile-->
             <span class="text-3xl cursor-pointer mx-2 flex md:hidden">
                <i data-lucide="menu" onclick="Menu(this)" class="w-9 h-9 text-gray-700 text-opacity-50"></i>
             </span>
            <!-- Left side of navbar / Nav Buttons -->
            <ul id="menu-list" class="md:flex md:items-center md:static fixed top-0 right-0 h-full w-3/4 border-2 border-gray-500 md:border-0
                    bg-gray-400 z-50 md:w-auto md:h-auto transform translate-x-full md:translate-x-0 transition-transform duration-500 text-center text-xl md:text-base">
                
                    <!-- Close Button -->
                <li class="flex justify-end p-4 md:hidden">
                    <button onclick="Menu()">
                        <i data-lucide="square-x" class="w-9 h-9 text-gray-700 text-opacity-50"></i>
                    </button>
                </li> 

                <!-- START OF MENU LIST -->
                <li class="my-11 md:my-0 mx-2">
                    <a href="index.php" class="text-gray-800 px-4 py-2 rounded hover:bg-pink-300 hover:text-pink-600 transition ease-in-out duration-700">About Me</a>
                </li>
                <li class="my-11 md:my-0 mx-2">
                    <a href="education.php" class="text-gray-800 px-4 py-2 rounded hover:bg-pink-300 hover:text-pink-600 transition ease-in-out duration-700">Education</a>
                </li>
                <li class="my-11 md:my-0 mx-2">
                    <a href="experience.php" class="text-gray-800 px-4 py-2 rounded hover:bg-red-300 hover:text-red-600 transition ease-in-out duration-700">Experience</a>
                </li>
                <li class="my-11 md:my-0 mx-2">
                    <a href="portfolio.php" class="text-gray-800 px-4 py-2 rounded hover:bg-purple-300 hover:text-purple-600 transition ease-in-out duration-700">Portfolio</a>
                </li>
                <li class="my-11 md:my-0 mx-2">
                    <a href="certificate.php" class="text-gray-800 px-4 py-2 rounded hover:bg-blue-300 hover:text-indigo-600 transition ease-in-out duration-700">Certificates</a>
                </li>
                <li class="my-11 md:my-0 mx-2">
                    <a href="profiles.php" class="text-gray-800 px-4 py-2 rounded hover:bg-cyan-300 hover:text-cyan-600 transition ease-in-out duration-700">Profiles</a>
                </li>
                <li id="secret-login" class="hidden my-11 md:my-0 mx-2">
                        <a href="../login.php" class="text-black text-opacity-50 px-4 py-2 rounded hover:bg-gray-200 transition ease-in-out duration-700"> Login</a>
                </li>
            </ul>
  </div>
</nav>

<script>
    // for secret login
    let secretClicks = 0;

document.getElementById("logo-secret").addEventListener("click", function (event) {
    secretClicks++;

    // debugging because the page automatically refreshes before login appears
    event.preventDefault();

    // stops going to index.php for secret clicks hehe
    if (secretClicks < 5) {
        event.preventDefault();
    }

    if (secretClicks === 5) {
        document.getElementById("secret-login").classList.remove("hidden");
        alert("😈sikret unlocked😈");
    }
});

    //for mobile responsiveeme 
    function Menu(icon) {
        const menu = document.getElementById("menu-list");
            menu.classList.toggle("translate-x-full");
    }

</script>