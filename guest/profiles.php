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

        <!--for name-->
            <div class="relative bg-white backdrop-blur-lg shadow-2xl rounded-3xl max-w-md mx-auto mt-20 px-6 pb-8 pt-10">
  
            <!-- my name -->
            <h1 class="text-2xl text-center font-semibold">My Profiles</h1>
            <!-- divider / hr -->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
            <!-- description-->
            <ul class="flex flex-col flex-wrap items-center gap-7 mb-6 mx-40">
            <li>
                <a href = "https://www.linkedin.com/in/ysabella-kristine-romero-0a472b362/" class="text-gray-800 px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition ease-in-out duration-700">LinkedIn</a>
            </li>
            <li>
                <a href = "privacy.php" class="text-gray-800 px-4 py-2 rounded hover:bg-indigo-500 hover:text-white transition ease-in-out duration-700">Facebook</a>
            </li>
            <li>
                <a href = "https://github.com/ysabellakristine" class="text-gray-800 px-4 py-2 rounded hover:bg-purple-500 hover:text-white transition ease-in-out duration-700">Github</a>
            </li>
            <li>
                <a href = "https://github.com/ysabellakristine2" class="text-gray-800 px-4 py-2 rounded hover:bg-black hover:text-white transition ease-in-out duration-700">Github2</a>
            </li>
        </ul>

    
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">
</div>
</div>
        <!-- Footer -->
    <?php include 'include/footer.php'; ?>
<script>
    lucide.createIcons();
    
</script>
</body>
</html>
