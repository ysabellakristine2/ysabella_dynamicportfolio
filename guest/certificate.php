<?php
require_once __DIR__ . '/../classes/ClassLoader.php';

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
            <!--icons for modal-->
    <script src="https://unpkg.com/lucide@latest"></script>
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
                <button onclick="filterCards('all')" class="px-4 py-2 bg bg-gray-600 text-white rounded hover:bg-red-500 hover:text-black transition ease-in-out duration-700">All</button>
                <button onclick="filterCards('certificate')" class="px-4 py-2 bg bg-gray-600 text-white rounded hover:bg-orange-400 hover:text-black transition ease-in-out duration-700">Certificates</button>
                <button onclick="filterCards('seminar')" class="px-4 py-2 bg bg-gray-600 text-white rounded hover:bg-yellow-400 hover:text-black transition ease-in-out duration-700">Seminars Attended</button>
                <button onclick="filterCards('org')" class="px-4 py-2 bg bg-gray-600 text-white rounded hover:bg-green-500 hover:text-black transition ease-in-out duration-700">Membership</button>
            </div>

 
            <!-- start of cards -->
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
                        <a href="<?= htmlspecialchars($ln['url']) ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center rounded-lg bg-green-300">
                        <?= htmlspecialchars($ln['label']) ?>
                        </a>
                    <?php endforeach; ?>
                    
                    <div class="flex justify-end gap-2 mt-4"></div>
                    </div>
                </div>
            <?php endforeach; ?>
            
                    <div class="flex justify-end gap-2 mt-4"></div>
        </div>
    </div>

   <!-- Footer -->
    <?php include 'include/footer.php'; ?>
<script>

    lucide.createIcons();

    
    function filterCards(category){
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            if (category === 'all' || card.classList.contains(category)){
                card.style.display = 'block';
            } else{
                card.style.display = 'none';
            }
        });
}

</script>
</body>
</html>
