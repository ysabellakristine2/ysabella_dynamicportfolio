<?php

require_once __DIR__ . '/ClassLoader.php';

class Profile extends Database {
    private string $table = "about";

    //get profile by id
    public function getProfile(int $id): ?array {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        return $this->executeQuerySingle($sql, ['id' => $id]);
    }

    // Update profile
public function updateProfile($id, $name, $title, $description)
{
    $stmt = $this->pdo->prepare("
        UPDATE {$this->table}
        SET name = ?, title = ?, description = ?
        WHERE id = ?
    ");

    $stmt->execute([$name, $title, $description, $id]);

    return $stmt->rowCount();
}
    // add new profile then inserts it into the id
    public function addProfile(string $name, string $title, string $description): int {
        $sql = "INSERT INTO {$this->table} (name, title, description) 
                VALUES (:name, :title, :description)";
        $this->executeQuery($sql, [
            'name' => $name,
            'title' => $title,
            'description' => $description
        ]);

        // Return last inserted id
        return $this->pdo->lastInsertId();
    }
}

