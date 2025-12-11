<?php
require_once __DIR__ . '/classes/ClassLoader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_id = $_POST['card_id'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $page = $_POST['page'];
    $links = $_POST['links'] ?? [];

    $cardObj->updateCardWithLinks($card_id, $category, $title, $description, $page, $links);
}

header("Location: ../portfolio.php");
exit;