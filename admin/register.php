<?php
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../classes/ClassLoader.php";


// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $userObj->registerUser(
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
    );

    if ($result) {
        echo "<p style='color:green;'>Registration successful!</p>";
    } else {
        echo "<p style='color:red;'>Registration failed!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--installing tailwind / not for development purposes-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class = "bg-gray-300 flex flex-col items-center overflow-auto">
    <div class = "bg-gray-200 w-[600px] p-5 rounded-xl shadow-2xl shadow-black/40 text-center border-[10px] border-gray-400 mt-40 gap-5">
        <h1 class = "font-bold">Admin Registration</h1>
        <img id="cat"src="images/LMAO.jpg" alt="cat ni TJ" class="h-60 mt-10 inline object-contain">
        <p id="oh no" class="mt-2"> 
            <a href="#" class="cursor-text" id="secret">LMAO</a><a href="#" class="cursor-text"> , get wrecked buddy, you don't get to register.</a>
        </p>
        <a id="back"class="font-bold text-red-500 text-center mt-5" href="../guest/index.php">GO BACK</a>

        
         <form method="POST" id="secret-register" class="hidden">
            <p class = "flex justify-center items-center gap-4 my-2 text-gray-500 font-sans text-gray-500 font-bold">
                <label>Username:</label>
                <input type="text" name="username" class="w-64 p-2.5 border border-gray-300 rounded ms-2 required">
            </p>

             <p class="flex justify-center items-center gap-4 my-2 text-gray-500 font-sans text-gray-500 font-bold">
                <label>Email: </label>
                <input type="email" name="email" required class="w-64 p-2.5 border border-gray-300 rounded ms-11">
            </p>
             <p class="flex justify-center items-center gap-4 my-2 text-gray-500 font-sans text-gray-500 font-bold">
                <label>Password:</label>
                <input type="password" name="password" required class="w-64 p-2.5 border border-gray-300 rounded ms-3">
            </p>
            
                </select>
            <p class="flex justify-center items-center gap-2 ms-2 my-3 text-[#fd7ff5] font-sans text-[#fd7ff5] font-bold">
                <button type="submit" class = "bg-gray-500 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded">Register</button>
            </p>
            <p>----------------------------</p>
            <p class="flex justify-center items-center gap-2 ms-2 my-3 text-[#fd7ff5] font-sans text-[#fd7ff5] font-bold">
                <a href="../login.php" class="text-center bg-gray-500 rounded hover:bg-purple-700 text-white font-semibold py-2 px-4"> Login </a>
            </p>
            <p>----------------------------</p>  
        </form>
    </div>
<script>
// for secret login
    let secretClicks = 0;

document.getElementById("secret").addEventListener("click", function (event) {
    secretClicks++;

    // debugging because the page automatically refreshes before login appears
    event.preventDefault();

    // stops going to index.php for secret clicks hehe
    if (secretClicks < 7) {
        event.preventDefault();
    }

    if (secretClicks === 7) {
        document.getElementById("secret-register").classList.remove("hidden");
        document.getElementById("cat").classList.add("hidden");
        document.getElementById("oh no").classList.add("hidden");
        document.getElementById("oh no").classList.add("hidden");
        document.getElementById("back").classList.add("hidden");
        alert(" 😈sikret unlocked😈 \n \n Fine, you pass. You can register now \n");
    }
});

    </script>
</body>