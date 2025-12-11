<?php
require_once __DIR__ . '/backend/classes/ClassLoader.php';

$id = 1;
$data = $profileObj->getProfile($id);
?>
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
    <!--for tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <style>
        /* scrollbar to make it beautiful */
        .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
        background: rgb(255, 0, 191);
        border-radius: 9999px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 9999px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 0, 0, 0.5);
        }
        /* scrollbar to make it beautiful */
        .custom-scrollbar-purple::-webkit-scrollbar {
        width: 8px;
        }

        .custom-scrollbar-purple::-webkit-scrollbar-track {
        background: rgb(195, 0, 255);
        border-radius: 9999px;
        }

        .custom-scrollbar-purple::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 9999px;
        }

        .custom-scrollbar-purple::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 0, 0, 0.5);
        }
    </style>
<body class ="bg-gray-300">
        <!-- Navbar -->
    <?php include 'include/navbar.php'; ?>
    <!--BODY SECTION-->
    <!--layout container my beloved-->
    <div class="flex flex-col min-h-screen mb-40">
            <!--MODAL FOR Editing About -->
                <div id="editAboutModal" class="fixed hidden inset-0 bg-black/50 flex items-center justify-center z-50">
                    <div class="bg-white p-6 border-[10px] border-gray-400 rounded-lg w-[600px]">
                        <h1 class="text-2xl font-bold mb-6 text-center">Edit Profile</h1>

                    <form method="POST" action="backend/edit_profile.php">
                        <label class="block font-medium">Name</label>
                        <input type="hidden" name="profile_id" id="edit_profile_id">

                        <input type="text" id= "edit_name" name="name" value="<?= htmlspecialchars($data['name']) ?>"
                            class="w-full mt-1 mb-4 p-2 border rounded-lg">

                        <label class="block font-medium">Title</label>
                        <input type="text" id= "edit_title" name="title" value="<?= htmlspecialchars($data['title']) ?>"
                            class="w-full mt-1 mb-4 p-2 border rounded-lg">
                    
                        <label class="block font-medium">Description</label>
                        <textarea name="description" id= "edit_description"
                                class="w-full mt-1 p-2 border rounded-lg h-40"><?= htmlspecialchars($data['description']) ?></textarea>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeEditAboutModal()" class="border px-4 py-2 rounded bg-gray-300 rounded hover:bg-red-500 hover:text-white transition ease-in-out duration-700">Cancel</button>
                        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-green-500 transition ease-in-out duration-7000">Update</button>
                    </div>
                    </form>
                </div>
    </div>
        <!--for name-->
            <div class="relative bg-white backdrop-blur-lg shadow-2xl rounded-3xl max-w-md mx-auto mt-40 px-6 pb-8 pt-20">
  
            <!-- profile Image overlapping on top of card -->
            <div class="absolute -top-16 left-1/2 transform -translate-x-1/2">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white">
                    <img id="secret-profile" src="images/profile_wm.png" alt="my photo" class="w-full h-full object-cover" />
                </div>
            </div>

        <!-- Edit BUTTON-->
        <div class="flex justify-center mb-8">
            <button class="editBtn px-4 py-2 justify-center bg-gray-500 text-white rounded-lg hover:bg-orange-500 transition ease-in-out duration-700"
                data-id="<?= $data['id'] ?>" data-name="<?= htmlspecialchars($data['name'], ENT_QUOTES) ?>"
                data-title="<?= htmlspecialchars($data['title'], ENT_QUOTES) ?>" data-description="<?= htmlspecialchars($data['description'], ENT_QUOTES) ?>"
            > Edit </button>
        </div>

            <!-- my name -->
            <h1 class="text-2xl text-center font-semibold"><?= $data['name']; ?></h1>
            <!-- subtitle-->
            <h2 class="text-center text-l italic mt-4"><?= $data['title']; ?></h2>
            <!-- divider / hr -->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
            <!-- description -->
            <p class="text-left text-gray-700 mt-2 mx-6">
                <?= nl2br($data['description']); ?>
            </p>
            <!-- end of Dynamic content for about me-->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
            <!-- Add BUTTON for TechSkills modal -->
        <div class="flex justify-center mb-8">
            <button onclick="openAddTechModal()"  class="px-4 py-2 justify-center bg-gray-500 text-white rounded-lg hover:bg-orange-500 transition ease-in-out duration-700">Add Card</button>
        </div>
            <button onclick="toggleModal('modalTechSkills')" class="mt-5 mx-auto block bg-gray-600 hover:bg-pink-400 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700"> My Technical Skills</button>
            <button onclick="toggleModal('modalSkills')" class="mt-5 mx-auto block bg-gray-600 hover:bg-purple-400 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-700"> My Soft Skills</button>

            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
        </div>

        

            <!-- Modal for Skills -->

            <div id="modalTechSkills" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                <div class="modal-box bg-pink-400 w-[125vh] max-w-[125vh] max-h-[90vh] p-10 rounded-xl shadow-2xl relative mx-auto overflow-y-auto custom-scrollbar">
                    <!-- Close Button -->
                    <button onclick="toggleModal('modalTechSkills')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>

                <!-- Header -->
                <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                    <i data-lucide="id-card-lanyard" class="w-9 h-9 text-purple-700"></i>
                    Technical Skills </h2>
                <hr class="my-6 border-gray-800 w-full mx-auto">

                <!-- Contents -->
                <ul class="grid grid-cols-1 items-start gap-4 text-black md:text-sm text-xs space-y-3">
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-300 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="wrench" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Testing Tools:</span>
                        </div>
                        <span>POSTMAN (API Testing), Playwright (Automation)</span>
                    </li>      
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                    <div class="flex items-center gap-2">
                        <i data-lucide="wrench" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Manual Testing:</span>
                        </div>
                        <span>Regression, Sanity, Smoke, Backward compatibility</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="accessibility" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Accessibility Testing:</span>
                        </div>
                        <span>Manual WCAG testing , Accessibility Insights</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="book-marked" class="w-6 h-6 text-purple-700 ms-1"></i> 
                            <span class="font-bold">Methodologies:</span>
                        </div>
                        <span>Agile, Scrum</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="blinds" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Project Management:</span>
                        </div>    
                        <span>Jira, Miro, MS Teams</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="mail-check" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Email Testing:</span>
                        </div>
                        <span>Testmail, Mailinator, Webuzo </span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="code" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Programming:</span>
                        </div>
                        <span>C++, JavaScript, Python, PHP, VBA</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="code" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Web Development:</span>
                        </div>
                        <span>HTML, CSS (Tailwind, Bootstrap)</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="pencil-line" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Technical Writing: </span>
                        </div>
                        <span>Helpdesk (Cayzu), Patch / Release Notes</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="settings" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Version control:</span>
                        </div>
                        <span>GIT</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="database" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Database:</span>
                        </div>
                        <span>SQL, Database Modeling (ERD), dbdiagram.io</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="wrench" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Data Analysis:</span>
                        </div>
                        <span>Looker Studio, Tableau Public, Power BI, Google Sheets, Excel</span>
                        </li>
                    <li class="grid grid-cols-[1fr_2fr] items-center hover:bg-white transition duration-700 rounded-lg cursor-default"> 
                        <div class="flex items-center gap-2">
                        <i data-lucide="wrench" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Tools & Platforms:</span>
                        </div>
                        <span>Cisco Packet Tracer, Logisim, Microsoft Office, Canva</span>
                        </li>
                </ul>
            </div>
        </div>
        <!-- START OF SOFT SKILLS MODAL-->
            <div id="modalSkills" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
                <!-- Modal Box -->
                <div class="modal-box bg-purple-400 w-[90vw] max-w-[125vh] max-h-[90vh] p-10 rounded-xl shadow-2xl relative mx-auto overflow-y-auto custom-scrollbar-purple">
                    <!-- Close Button -->
                    <button onclick="toggleModal('modalSkills')" class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-4xl font-bold">&times;</button>

                <!-- Header -->
                <h2 class="text-3xl font-bold mb-6 flex items-center gap-2">
                    <i data-lucide="users" class="w-9 h-9 text-purple-700"></i>
                    Soft Skills </h2>
                <hr class="my-6 border-gray-800 w-full mx-auto">

                <!-- Contents -->
                <ul class="grid grid-cols-1 md:grid-cols-2 items-start gap-4 text-black text-l">
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="handshake" class="w-6 h-6 text-purple-700 "></i> 
                            <span class="font-bold">Teamwork & Collaboration</span>
                        </div>
                    </li>      
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                    <div class="flex gap-2 justify-center">
                        <i data-lucide="search-check" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Problem-Solving</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="megaphone" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Communication</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="hourglass" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Time Management</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="text-search" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Attention to Detail</span>
                        </div>    
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="sparkles" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Creativity</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="align-vertical-justify-end" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Organization</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="pocket-knife" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Multitasking</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="lightbulb" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Initiative</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="laptop" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Tech Literate</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="land-plot" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Leadership</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="refresh-ccw" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Adaptability</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="compass" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Resourcefulness</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="badge-check" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Accountability</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="book-open" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Willingness to Learn</span>
                        </div>
                        </li>
                    <li class="bg-white p-4 rounded-xl border border-gray-300 hover:shadow-lg hover:bg-purple-200 transition duration-300 cursor-default"> 
                        <div class="flex gap-2 justify-center">
                        <i data-lucide="heart-plus" class="w-6 h-6 text-purple-700 ms-2"></i> 
                            <span class="font-bold">Empathy</span>
                        </div>
                        </li>
                </ul>
            </div>
        </div>

</div>
</div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

<script>
    lucide.createIcons();

document.querySelectorAll('.editBtn').forEach(btn => {
    btn.addEventListener('click', () => {

        // Basic fields
        document.getElementById('edit_profile_id').value = btn.dataset.id;
        document.getElementById('edit_name').value = btn.dataset.name;
        document.getElementById('edit_title').value = btn.dataset.title;
        document.getElementById('edit_description').value = btn.dataset.description;

        // Parse links
        const links = JSON.parse(btn.dataset.links || "[]");

        // Show modal
        document.getElementById('editAboutModal').classList.remove('hidden');
    });
});

    function closeEditAboutModal(){
        document.getElementById('editAboutModal').classList.add('hidden');
    }

      function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('flex')) {
            modal.classList.add('flex');
        } else {
            modal.classList.remove('flex');
        }
 }

 // for secret profile
    let secretClicks = 0;

document.getElementById("secret-profile").addEventListener("click", function (event) {
    secretClicks++;
    // does nothing
    if (secretClicks < 5) {
        return;
    }
    if (secretClicks === 5) {
         // Change the picture
        document.getElementById("secret-profile").src = "images/ser ivan.jpg";
        alert(" Hi sir HAHAHAH natuwa ako sobra sa javascript \n");
    }
});
</script>
</body>
</html>
