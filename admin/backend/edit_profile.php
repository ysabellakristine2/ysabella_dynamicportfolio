<?php
require_once __DIR__ . "/classes/ClassLoader.php";

// needs id but its always 1 so
$profile_id = 1;

// fetch profile
$data = $profileObj->getProfile($profile_id);

// saving
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    //updates profile
    $profileObj->updateProfile($profile_id, $name, $title, $description);

    // redirect to index
    header("Location: ../index.php");
    exit;
}
?>
