<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/ClassLoader.php';

class CardLink extends Database{


    public function addLink(int $card_id, string $label, string $url): bool{
        return $this->create("card_links", [
            "card_id" => $card_id,
            "label" => $label,
            "url" => $url,
        ]);
    }

/** READ links for a card */
public function getLinksByCard(int $card_id): array
{
    return $this->executeQuery(
        "SELECT * FROM card_links WHERE card_id = :card_id",
        [":card_id" => $card_id]
    );
}

/** READ single link */
public function getLink(int $id): ?array
{
    return $this->executeQuerySingle(
        "SELECT * FROM card_links WHERE id = :id",
        [":id" => $id]
    );
}

/** UPDATE link */
public function editLink(int $id, string $label, string $url): bool
{
    return $this->update(
        "card_links",
        [
            "label" => $label,
            "url" => $url,
        ],
        "id = $id"
    );
}

/** DELETE link */
public function removeLink(int $id): bool
{
    return $this->delete("card_links", "id = $id");
}
}