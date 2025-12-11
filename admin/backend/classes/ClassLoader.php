<?php  
require_once 'Database.php';
require_once 'User.php';
require_once 'CardLink.php';
require_once 'Card.php';
require_once 'Profile.php';

$databaseObj= new Database();
$conn = $databaseObj->getPdo();
$cardObj = new Card();
$linkObj = new CardLink();
$userObj = new User();
$userObj->startSession();
$profileObj = new Profile();
?>