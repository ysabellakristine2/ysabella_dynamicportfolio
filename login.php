<?php
session_start();
require_once __DIR__ . '/classes/ClassLoader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login_input = trim($_POST['login_input'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login_input && $password) {
        if (filter_var($login_input, FILTER_VALIDATE_EMAIL)) {
            $loginResult = $userObj->loginUser($login_input, $password);
        } else {
            $loginResult = $userObj->loginUserByUsername($login_input, $password);
        }

        if ($loginResult === true) {
            $_SESSION['welcomeMessage'] = "Welcome, {$_SESSION['username']}!";

            if ($_SESSION['role'] === 'admin') {
                header("Location: admin/index.php");
            } else {
                header("Location: guest/index.php");
            }
            exit;
        } else {
            $_SESSION['message'] = "Invalid login credentials";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--installing tailwind / not for development purposes-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class = "bg-gray-300 flex flex-col items-center overflow-auto">
    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: red;"><?php echo $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <!-- -->

    <div class = "bg-gray-200 w-[600px] p-5 rounded-xl shadow-2xl shadow-black/40 text-center border-[10px] border-gray-400 mt-40 gap-5">
        <h1 class= "font-bold text-5xl mb-10">Login</h1>
        <form action="login.php" method="POST">
            <p class ="flex justify-center items-center gap-4 my-2 text-gray-500 font-sans text-gray-500 font-bold">
                <label for="login_input">Username or Email</label>
                <input class="w-64 p-2.5 border border-gray-300 rounded ms-3" type="text" name="login_input" required placeholder="Enter your username or email">
            </p>
            <p class ="flex justify-center items-center gap-4 my-2 text-gray-500 font-sans text-gray-500 font-bold">
                <label for="password">Password</label>
                <input class="w-64 p-2.5 border border-gray-300 rounded ms-20" type="password" name="password" required placeholder="Enter your password">
            </p>
            <input type="submit" name="loginBtn" value="Login"
            class="w-80 p-2.5 my-2 border border-gray-300 rounded bg-gray-500 text-white font-bold hover:bg-pink-400 transition">
        </p>
        <br>
        </form>
        <p>Don't have an account? Register Here: </p>
        <a class="inline-block px-4 py-2 mt-2 bg-gray-500 text-white rounded hover:bg-pink-400 transition" href="admin/register.php">Register</a>
        </p>
        <br>
        <p> If you're seeing this and you're not the owner of the resume, please go <a class="font-bold text-red-500" href="guest/index.php">BACK</a></p>
    </div>
</body>
</html>
