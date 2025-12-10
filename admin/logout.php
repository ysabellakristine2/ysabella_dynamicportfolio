<?php
require_once __DIR__ . '/../classes/ClassLoader.php';
$userObj->logout();

// Redirect to login page
header("Location: ../index.html");
exit;
?>
