<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ysabella's Resume</title>
        <!--icon for website-->
    <link rel="icon" href="images/favicon.png" type="image/png">
    <!--icons for modal-->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class ="bg-gray-300">
    
        <!-- Navbar -->
    <?php include 'include/navbar.php'; ?>


    <!--BODY SECTION-->
    <!--layout container my beloved-->
    <div class="flex flex-col min-h-screen mb-20">

        <!--for name-->
            <div class="relative bg-white backdrop-blur-lg shadow-2xl rounded-3xl w-[450px] mx-auto mt-20 px-6 pb-8 pt-10">
  
            <!-- my name -->
            <h1 class="text-2xl text-center font-semibold">My Experience</h1>
            <!-- divider / hr -->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">

            <!-- Filpass -->
                <h1 class="ml-6 text-base text-left font-semibold">FilPass / Edufied </h1>
                <p class="ml-6 text-base text-left italic">Quality Assurance Trainee</p>
                <p class ="ml-6 text-sm text-left italic">Remote<br> 
                August 2025 - January 2026 (Expected)</p>
                    <button onclick="toggleModal('modalFilpass')" class="mt-5 mx-auto block bg-gray-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700">
                     View Experience</button>
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
            <!-- Ollopa -->
            <h1 class="ml-6 text-base text-left font-semibold">Ollopa Corporation </h1>
                <p class="ml-6 text-base text-left italic">IT Intern </p>
                <p class ="ml-6 text-sm text-left italic">Remote <br> 
                June 2025 - August 2025</p>   
                    <button onclick="toggleModal('modalOllopa')" class="mt-5 mx-auto block bg-gray-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700">
                     View Experience</button>
                        <hr class="my-6 border-gray-800 w-3/4 mx-auto">

            <!-- BloomFit Comp Shop -->
            <h1 class="ml-6 text-base text-left font-semibold">BloomFit Computer Shop</h1>
                <p class="ml-6 text-base text-left italic">Computer Shop Manager</p>
                <p class ="ml-6 text-sm text-left italic">Dasmarinas, Cavite <br> 
                2015 - 2020</p>   
                    <button onclick="toggleModal('modalBloomfit')" class="mt-5 mx-auto block bg-gray-600 hover:bg-purple-400 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700">
                     View Experience</button>
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">

</div>
</div>


                    <!-- MODALS for Experience -->
                <div id="modalFilpass" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                    <div class="modal-box bg-blue-400 w-[90vw] max-w-[1000px] max-h-[90vh] p-10 rounded-xl shadow-2xl relative mx-auto my-auto">
                        <!-- Close Button -->
                        <button onclick="toggleModal('modalFilpass')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>
                        <!-- Header -->
                        <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                            <i data-lucide="briefcase-business" class="w-9 h-9 text-blue-800"></i>
                            Experience</h2>
                        <hr class="my-6 border-gray-800 w-full mx-auto">

                        <!-- Contents -->
                        <ul class="items-start gap-4 text-black text-l space-y-4">

                            <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                                <div class="flex items-center gap-2">
                                    <i data-lucide="search-check" class="w-8 h-8 text-blue-800 ms-2"></i>  
                                   Conducted manual testing and supported the deployment of Edufied’s Filpass V2 from staging to production environments, ensuring functionality and usability throughout.
                                </div>
                            </li>
                            <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="network" class="w-6 h-6 text-blue-800 ms-2"></i>
                                    Conducted automated and API testing using Playwright and Postman to verify system integrations and endpoints.                            </div>
                            </li>
                               <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="bug" class="w-6 h-6 text-blue-800 ms-2"></i>
                                    Logged and retested 200+ bug tickets on Jira and assessed WCAG 2.2 compliance of Filpass pages.
                                </div>
                                </li>
                               <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="pencil-line" class="w-6 h-6 text-blue-800 ms-2"></i>
                                    Created most of the V2 Filpass Helpdesk Articles and Release Notes. 
                                </div>
                                </li>
                                <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="bot-message-square" class="w-6 h-6 text-blue-800 ms-2"></i>
                                    Produced system documentation and optimized the FilPass chatbot’s responses to client inquiries.
                                </div>
                                </li>
                    </ul>
                </div>
        </div>
        <!--Modal for Ollopa-->
        <div id="modalOllopa" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                <div class="modal-box bg-green-400 w-[90vw] max-w-[1000px] max-h-[90vh] overflow-y-auto p-10 rounded-xl shadow-2xl relative mx-auto my-auto">
                    <!-- Close Button -->
                    <button onclick="toggleModal('modalOllopa')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>
                    
                    <!-- Contents -->
                    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                                <i data-lucide="briefcase-business" class="w-9 h-9 text-green-800"></i>
                                Experience</h2>
                        <hr class="my-6 border-gray-800 w-full mx-auto">
                    <ul class="items-start gap-4 text-black text-l space-y-4 ">
                        <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="code" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Assisted in designing Ollopa’s Company Profile website to provide onboarding information for new interns.
                                </div>    
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="search-check" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Performed overall QA testing on the Egetinnz.com website to ensure functionality and user experience.
                                </div>
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="book-open-text" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Managed and updated daily booking listings on Egetinnz.com.
                                </div>
                            </li>
                </ul>
                </div>
        </div>

        <!--Modal for BloomFit-->
        <div id="modalBloomfit" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                <div class="modal-box bg-purple-400 w-[90vw] max-w-[1000px] max-h-[90vh] overflow-y-auto p-10 rounded-xl shadow-2xl relative mx-auto my-auto">
                    <!-- Close Button -->
                    <button onclick="toggleModal('modalBloomfit')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>
                    
                    <!-- Contents -->
                    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                                <i data-lucide="briefcase-business" class="w-9 h-9 text-purple-800"></i>
                                Experience</h2>
                        <hr class="my-6 border-gray-800 w-full mx-auto">
                    <ul class="items-start gap-4 text-black text-l space-y-4 ">
                        <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="store" class="w-6 h-6 text-purple-800 ms-2"></i>
                                    Managed daily shop operations and customer transactions to ensure a smooth and efficient workflow. 
                                </div>    
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="wrench" class="w-6 h-6 text-purple-800 ms-2"></i>
                                    Diagnosed and resolved hardware and software issues to maintain optimal system functionality.
                                </div>
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="monitor" class="w-6 h-6 text-purple-800 ms-2"></i>
                                    Monitored PCs to maintain consistent performance and user experience.
                                </div>
                            </li>
                </ul>
            </div>
    </div>


<!-- Footer -->
    <?php include 'include/footer.php'; ?>
<script>
        // FOR LUCIDE ICONS
    lucide.createIcons();

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('flex')) {
            modal.classList.add('flex');
        } else {
            modal.classList.remove('flex');
        }
 }
</script>
</body>
</html>
