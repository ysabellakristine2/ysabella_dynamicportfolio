<?php
require_once 'Database.php';

class Card extends Database
{
       // Insert card only
    public function addCard(array $data): int|false {
        return $this->createRegister("cards", $data);
    }

    // Insert multiple links for a card
    public function addLink(int $card_id, string $label, string $url): bool {
        return $this->create("card_links", [
            "card_id" => $card_id,
            "label" => $label,
            "url" => $url
        ]);
    }

    public function addCardWithLinks(array $cardData, array $links): int|false {
        $card_id = $this->addCard($cardData);
        if (!$card_id) return false;

        foreach ($links as $ln) {
            if (!empty($ln['label']) && !empty($ln['url'])) {
                $this->addLink($card_id, $ln['label'], $ln['url']);
            }
        }
        return $card_id;
    }

    public function getAllCards(): array {
        return $this->getAll("cards");
    }

    public function getLinksByCard(int $card_id): array {
        return $this->executeQuery(
            "SELECT * FROM card_links WHERE card_id = ?",
            [$card_id]
        );
    }

    public function getCardsByPage(string $page): array
{
    return $this->executeQuery(
        "SELECT * FROM cards WHERE page = ?",
        [$page]
    );
}

public function deleteCard($id){
    try {
        //debug
        $this->pdo->beginTransaction();

        //delete dependent rows
        $stmt = $this->pdo->prepare("DELETE FROM card_links WHERE card_id = ?");
        $stmt->execute([$id]);

        //delete card
        $stmt = $this->pdo->prepare("DELETE FROM cards WHERE card_id = ?");
        $stmt->execute([$id]);

        // uses pdo to commit this
        $this->pdo->commit();
        return true;
// debug
    } catch (PDOException $e) {
        // Rollback if something goes wrong
        $this->pdo->rollBack();
        throw $e; // or return false if you prefer
    }
}


public function updateCard($id, $category, $title, $description, $page)
{
    $stmt = $this->pdo->prepare("
        UPDATE cards
        SET category = ?, title = ?, description = ?, page = ?
        WHERE card_id = ?
    ");

    $stmt->execute([$category, $title, $description, $page, $id]);

    // DEBUG
    if ($stmt->rowCount() === 0) {
        error_log('No rows updated. ID: ' . $id);
    }
}

public function updateCardWithLinks(int $id, string $category, string $title, string $description, string $page, array $links = []): bool
{
    try {
        // begin transaction to ensure card and links update together
        $this->pdo->beginTransaction();

        //update card info
        $stmt = $this->pdo->prepare("
            UPDATE cards
            SET category = ?, title = ?, description = ?, page = ?
            WHERE card_id = ?
        ");
        $stmt->execute([$category, $title, $description, $page, $id]);

        // Delete old links
        $stmt = $this->pdo->prepare("DELETE FROM card_links WHERE card_id = ?");
        $stmt->execute([$id]);

        //Insert new links
        foreach ($links as $ln) {
            if (!empty($ln['label']) && !empty($ln['url'])) {
                $this->addLink($id, $ln['label'], $ln['url']);
            }
        }
        //commits transaction
        $this->pdo->commit();
        return true;
    } catch (PDOException $e) {
        $this->pdo->rollBack();
        throw $e;
    }
}

}