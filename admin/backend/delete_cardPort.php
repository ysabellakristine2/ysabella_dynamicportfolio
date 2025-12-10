<?php
require_once __DIR__ . '/classes/ClassLoader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_id = $_POST['card_id'];
    $cardObj->deleteCard($card_id);
}

header("Location: ../portfolio.php");
exit;