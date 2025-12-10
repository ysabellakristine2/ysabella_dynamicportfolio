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
            <div class="relative bg-white backdrop-blur-lg shadow-2xl rounded-3xl max-w-md mx-auto mt-40 px-6 pb-8 pt-20">

            <!-- my name -->
            <h1 class="text-2xl text-center text-red-600 font-semibold">Privacy Notice!</h1>

            <!-- divider / hr -->
            <hr class="my-6 border-gray-800 w-3/4 mx-auto">

            <h2 class="text-center text-l italic mt-4">Due to recent incidents involving phishing and fake job offers:</h2>
            <!-- description -->
            <p class="text-left text-gray-700 mt-2 mx-6">
                Access to my Facebook and Instagram accounts is restricted for security reasons. <br><br>
                If you would like to view these profiles for verification, portfolio, or networking purposes, please contact me directly via email first: <br><br></p>
                <div class="text-center">
                <a href="mailto:ysabellakristineromero@gmail.com" class="px-3 py-3 rounded-xl hover:bg-pink-200 hover:font-semibold hover:shadow-2xl transition">ysabellakristineromero@gmail.com</a> 
                </div>
            </p>
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
