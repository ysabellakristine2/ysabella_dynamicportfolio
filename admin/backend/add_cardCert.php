<?php
require_once 'classes/ClassLoader.php';

$cardData = [
    "page" => "certificate", 
    "category" => $_POST['category'],
    "title" => $_POST['title'],
    "description" => $_POST['description']
];

$links = $_POST['links'] ?? [];

$card_id = $cardObj->addCardWithLinks($cardData, $links);

if ($card_id) {
    header("Location: ../certificate.php");
    exit;
} else {
    echo "Failed to add card.";
}
