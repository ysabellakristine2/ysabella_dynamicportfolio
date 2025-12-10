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
            <h1 class="text-2xl text-center font-semibold">My Education</h1>
            <!-- divider / hr -->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">

            <!-- EAC -->
                <h1 class="ml-6 text-base text-left font-semibold">Emilio Aguinaldo College - Cavite Campus</h1>
                <p class="ml-6 text-base text-left italic">BS in Computer Science</p>
                <p class ="ml-6 text-sm text-left italic">Dasmarinas, Cavite <br> <br>
                August 2022 - July 2026 (Expected)</p>
                    <button onclick="toggleModal('modalEAC')" class="mt-5 mx-auto block bg-gray-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700">
                     Achievements</button>
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
            <!-- dlsud -->
            <h1 class="ml-6 text-base text-left font-semibold">De La Salle University - Dasmarinas </h1>
                <p class="ml-6 text-base text-left italic">BS in Industrial Engineering | With Honors</p>
                <p class ="ml-6 text-sm text-left italic">Dasmarinas, Cavite <br> 
                2021 - 2022 (1st year only)</p>   
                    <button onclick="toggleModal('modalDLSUD')" class="mt-5 mx-auto block bg-gray-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700">
                     Achievements</button>

            <hr class="my-6 border-gray-800 w-3/4 mx-auto">

</div>
</div>


                    <!-- MODALS for Achievements -->
                <div id="modalEAC" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                    <div class="modal-box bg-red-400 w-[90vw] max-w-[125vh] max-h-[90vh] p-10 rounded-xl shadow-2xl relative mx-auto my-auto">
                        <!-- Close Button -->
                        <button onclick="toggleModal('modalEAC')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>
                        <!-- Header -->
                        <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                            <i data-lucide="award" class="w-9 h-9 text-red-800"></i>
                            Achievements</h2>
                        <hr class="my-6 border-gray-800 w-full mx-auto">

                        <!-- Contents -->
                        <ul class="items-start gap-4 text-black text-sm space-y-4 ">

                            <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                                <div class="flex items-center gap-2">
                                    <i data-lucide="code" class="w-6 h-6 text-red-800 ms-2"></i> 
                                    
                                    Built a tourism website for Siquijor using HTML and Bootstrap  to demonstrate front-end development skills 
                                </div>
                            </li>
                            <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="code" class="w-6 h-6 text-red-800 ms-2"></i>
                                Designed a dynamic menu and ordering interface for a fictional burger restaurant using only vanilla JavaScript
                            </div>
                            </li>
                               <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="code" class="w-6 h-6 text-red-800 ms-2"></i>
                                    Developed a job portal website in PHP for both applicants and HR users, highlighting form handling and database interaction. 
                                </div>
                                </li>
                               <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="code" class="w-6 h-6 text-red-800 ms-2"></i>
                                    Created a collaborative document editing platform using PHP and vanilla JavaScript, simulating key features of Google Docs. 
                                </div>
                                </li>
                               <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="scroll-text" class="w-6 h-6 text-red-800 ms-2"></i>
                                    Research Leader, group project: “Epekto ng Face-to-Face sa Academic Performance ng mga Mag-aaral ng Kursong Computer Science sa Emilio Aguinaldo College Cavite”
                                </div>
                            </li>
                    </ul>
                </div>
        </div>

        <div id="modalDLSUD" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                <div class="modal-box bg-green-400 w-[90vw] max-w-[125vh] max-h-[90vh] overflow-y-auto p-10 rounded-xl shadow-2xl relative mx-auto my-auto">
                    <!-- Close Button -->
                    <button onclick="toggleModal('modalDLSUD')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>
                    
                    <!-- Contents -->
                    <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                                <i data-lucide="award" class="w-9 h-9 text-green-800"></i>
                                Achievements</h2>
                        <hr class="my-6 border-gray-800 w-full mx-auto">
                    <ul class="items-start gap-4 text-black text-sm space-y-4 ">
                        <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="code" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Developed a calculator application using VBA 
                                </div>    
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="book-open-text" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Wrote and designed a basic Calculus book: “Straight to the Point”, covering calculus topics
                                </div>
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="flag" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Consistently selected as group leader for collaborative projects
                                </div>
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="pencil-line" class="w-6 h-6 text-green-800 ms-2"></i>
                                    Co-authored a program proposal for an NSTP webinar: “Bagong Kabataan, Bagong Kabanata”
                                </div>
                            </li>
                    <li class="items-center hover:bg-white transition duration-700 rounded-lg cursor-default">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="land-plot" class="w-6 h-6 text-green-800 ms-2"></i> 
                                    Created and managed a teenage pregnancy awareness campaign on Facebook: “Prevent Teenage Pregnancy Campaign”
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
