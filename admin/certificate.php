<?php
require_once __DIR__ . '/backend/classes/ClassLoader.php';

$cards = $cardObj->getCardsByPage('certificate');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ysabella's Resume</title>
        <!--icon for website-->
    <link rel="icon" href="images/favicon.png" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class ="bg-gray-300">
    
        <!-- Navbar -->
    <?php include 'include/navbar.php'; ?>

    <!--BODY SECTION-->
    <!--layout container my beloved-->
    <div class="flex flex-col min-h-screen mb-20">
  
            <!--  title -->
            <h1 class="text-2xl text-center font-semibold mt-20">Professional Development</h1>
            <!-- filter buttons -->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
            <div class="flex justify-center gap-2 mb-8">
                <button onclick="filterCards('all')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-red-500 hover:text-black transition ease-in-out duration-700">All</button>
                <button onclick="filterCards('certificate')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-orange-400 hover:text-black transition ease-in-out duration-700">Certificates</button>
                <button onclick="filterCards('seminar')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-yellow-400 hover:text-black transition ease-in-out duration-700">Seminars Attended</button>
                <button onclick="filterCards('org')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-green-500 hover:text-black transition ease-in-out duration-700">Membership</button>
            </div>

            <!-- ADD CARD BUTTON -->
        <div class="flex justify-center mb-8">
            <button onclick="openAddCardModal()"  class="px-4 py-2 justify-center bg-gray-500 text-white rounded-lg hover:bg-orange-500 transition ease-in-out duration-700">Add Card</button>
        </div>

        <!-- ADD CARD MODAL -->
        <div id="addCardModal" class="fixed hidden inset-0 bg-black/50 flex items-center justify-center">
        <div class="bg-white border-[10px] border-gray-400 p-6 rounded-lg w-[600px] relative gap-2">
            <h2 class="text-xl font-semibold mb-4">Add New Card</h2>
            <form id="addCardForm" method="post" action="backend/add_cardCert.php">
            <!-- Category -->
            <label>Category</label>
            <input name="category" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-3" required>
            <!-- Title -->
            <label>Title</label>
            <input name="title" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-3" required>
            <!-- Description -->
            <label>Description</label>
            <textarea name="description" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-3" required></textarea>
            <!-- Links Section -->
                    <div id="addCardLinksContainer"></div>
                        <button type="button" onclick="addLinkField('addCardLinksContainer')" class="px-3 py-1 bg-gray-500 text-white rounded mb-3 hover:bg-blue-500 transition ease-in-out duration-700">+ Add Link</button>
                        <hr class="my-4">

                        <div class="flex justify-end gap-2">
                            <button type="button" onclick="closeAddCardModal()" class="px-4 py-2 border bg-gray-300 rounded hover:bg-red-500 hover:text-white transition ease-in-out duration-700">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-green-500 transition ease-in-out duration-700">Save</button>
                        </div>
                    </form>
                    </div>
                </div>

      <!-- Edit Card Modal -->
        <div id="editCardModal" class="fixed hidden inset-0 bg-black/50 flex items-center justify-center">
            <div class="bg-white p-6 border-[10px] border-gray-400 rounded-lg w-[600px]">
                <h2 class="text-xl font-semibold mb-4">Edit Card</h2>

                <form method="post" action="backend/edit_cardCert.php">
                    <input type="hidden" name="card_id" id="edit_card_id">

                    <input type="hidden" name="page" id="edit_page">

                    <label>Category</label>
                    <input name="category" id="edit_category" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-3" required>

                    <label>Title</label>
                    <input name="title" id="edit_title" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-3" required>

                    <label>Description</label>
                    <textarea name="description" id="edit_description" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-3"></textarea>
                    <div id="editLinksContainer"></div>
                    <button type="button" onclick="addEditLinkField()" class="px-3 py-1 bg-gray-500 text-white rounded mb-3 hover:bg-blue-500 transition ease-in-out duration-700">Add Link</button>

                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeEditCardModal()" class="border px-4 py-2 rounded bg-gray-300 rounded hover:bg-red-500 hover:text-white transition ease-in-out duration-700">Cancel</button>
                        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-green-500 transition ease-in-out duration-7000">Update</button>

                    </div>
                </form>
            </div>
        </div>

            <!-- card grid -->
        <div id="cardContainer" class="grid grid-cols-2 gap-6 mx-auto">
            <?php foreach ($cards as $card): ?>
                <?php $links = $linkObj->getLinksByCard($card['card_id']); ?>

                <div class="card <?= htmlspecialchars($card['category']) ?> max-w-lg p-6 bg-white border border-gray-400 rounded-lg shadow-xl text-black">
                    <h1 class="mb-3 text-2xl font-semibold tracking-tight"><?= htmlspecialchars($card['title']) ?></h1>
                    <hr class="my-3 border-gray-800 w-full mx-auto">
                    <p class="mb-3 font-normal"><?= htmlspecialchars($card['description']) ?></p>

                    <!-- Links -->
                    <?php foreach ($links as $ln): ?>
                        <a href="<?= htmlspecialchars($ln['url']) ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center rounded-lg bg-gray-300 hover:bg-blue-500 transition ease-in-out duration-7000">
                        <?= htmlspecialchars($ln['label']) ?>
                        </a>
                    <?php endforeach; ?>

                    <div class="flex justify-end gap-2 mt-4">

                        <!-- Edit -->
                        <button class="editBtn px-3 py-1 bg-gray-400 text-black rounded text-sm hover:bg-yellow-500 transition ease-in-out duration-7000 "
                                data-id="<?= $card['card_id'] ?>" data-category="<?= htmlspecialchars($card['category'], ENT_QUOTES) ?>"
                                data-title="<?= htmlspecialchars($card['title'], ENT_QUOTES) ?>" data-description="<?= htmlspecialchars($card['description'], ENT_QUOTES) ?>"
                                data-page="<?= htmlspecialchars($card['page'], ENT_QUOTES) ?>" data-links="<?= htmlspecialchars(json_encode($links), ENT_QUOTES) ?>" 
                        > Edit </button>


                        <!-- Delete -->
                        <form method="post" action="backend/delete_cardCert.php" onsubmit="return confirm('Are you sure you want to delete this card?');">
                            <input type="hidden" name="card_id" value="<?= $card['card_id'] ?>">
                            <button type="submit" class="px-3 py-1 bg-gray-500 text-white rounded text-sm hover:bg-green-500 transition ease-in-out duration-7000">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

   <!-- Footer -->
    <?php include 'include/footer.php'; ?>
<script>

let linkCount = 0;

function addLinkField(containerId) {
            linkCount++;
            const container = document.getElementById(containerId);
            const wrapper = document.createElement("div");
            wrapper.classList.add("mb-3");
            wrapper.innerHTML = `
                <label class="mb-1">Link Label</label>
                <input name="links[${linkCount}][label]" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded mb-2" required>

                <label class="mb-1">URL</label>
                <input name="links[${linkCount}][url]" class="w-full border-[2px] border-gray-400 px-3 py-2 rounded" required>

                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 text-sm mt-1">Remove</button>
            `;
            container.appendChild(wrapper);
        }
    
        let editLinkCount = 0;

function addEditLinkField() {
    editLinkCount++;
    const container = document.getElementById("editLinksContainer");
    const wrapper = document.createElement("div");
    wrapper.classList.add("mb-3");
    wrapper.innerHTML = `
        <label class="mb-1">Link Label</label>
        <input name="links[${editLinkCount}][label]" class="w-full border-2 border-gray-400 px-3 py-2 rounded mb-2" required>

        <label class="mb-1">URL</label>
        <input name="links[${editLinkCount}][url]" class="w-full border-2 border-gray-400 px-3 py-2 rounded" required>

        <button type="button" onclick="this.parentElement.remove()" class="text-red-500 text-sm mt-1">Remove</button>
    `;
    container.appendChild(wrapper);
}
    function openAddCardModal(){
        document.getElementById('addCardModal').classList.remove('hidden');
    }
    function closeAddCardModal(){
        document.getElementById('addCardModal').classList.add('hidden');
    }

    function openEditCardModal(card){
        document.getElementById('edit_card_id').value = card.card_id;
        document.getElementById('edit_category').value = card.category;
        document.getElementById('edit_title').value = card.title;
        document.getElementById('edit_description').value = card.description;

        document.getElementById('editCardModal').classList.remove('hidden');
    }

    function closeEditCardModal(){
        document.getElementById('editCardModal').classList.add('hidden');
    }
    
document.querySelectorAll('.editBtn').forEach(btn => {
    btn.addEventListener('click', () => {

        // Basic fields
        document.getElementById('edit_card_id').value = btn.dataset.id;
        document.getElementById('edit_category').value = btn.dataset.category;
        document.getElementById('edit_title').value = btn.dataset.title;
        document.getElementById('edit_description').value = btn.dataset.description;
        document.getElementById('edit_page').value = btn.dataset.page;

        // Parse links
        const links = JSON.parse(btn.dataset.links || "[]");

        // Container for edit links
        const container = document.getElementById("editLinksContainer");
        container.innerHTML = ""; // Clear previous

        // Insert existing links
        links.forEach((ln, i) => {
            const wrapper = document.createElement("div");
            wrapper.classList.add("mb-3");
            wrapper.innerHTML = `
                <label class="block mb-1">Link Label</label>
                <input name="links[${i}][label]" class="w-full border-2 border-gray-400 px-3 py-2 rounded mb-2" value="${ln.label}" required>

                <label class="block mb-1">URL</label>
                <input name="links[${i}][url]" class="w-full border-2 border-gray-400 px-3 py-2 rounded" value="${ln.url}" required>

                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 text-sm mt-1">Remove</button>
            `;
            container.appendChild(wrapper);
        });

        // Show modal
        document.getElementById('editCardModal').classList.remove('hidden');
    });
});


    function filterCards(category){
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            if (category === 'all' || card.classList.contains(category)){
                card.style.display = '';
            } else{
                card.style.display = 'none';
            }
        });
}

</script>
</body>
</html>
