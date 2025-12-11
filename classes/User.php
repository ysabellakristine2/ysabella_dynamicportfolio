<?php
require_once 'Database.php';

class User extends Database {

    /* Start session */
    public function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /* Check if username exists */
    public function usernameExists(string $username): bool {
        $sql = "SELECT COUNT(*) AS cnt FROM users WHERE username = ?";
        $row = $this->executeQuerySingle($sql, [$username]);
        return $row['cnt'] > 0;
    }

    /* Register user */
    public function registerUser(
        string $username,
        string $email,
        string $password,
        string $role = 'admin'
    ): bool {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, role)
                VALUES (?, ?, ?, ?)";

        try {
            $this->executeNonQuery($sql, [
                $username,
                $email,
                $hashed,
                $role
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /* Login via email */
    public function loginUser(string $email, string $password): bool {
        $sql = "SELECT user_id, username, password, role
                FROM users WHERE email = ?";

        $user = $this->executeQuerySingle($sql, [$email]);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $this->startSession();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        return true;
    }

    /* Login via username */
    public function loginUserByUsername(string $username, string $password): bool {
        $sql = "SELECT user_id, username, password, role
                FROM users WHERE username = ?";

        $user = $this->executeQuerySingle($sql, [$username]);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $this->startSession();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        return true;
    }

    /* Logout */
    public function logout(): void {
        $this->startSession();
        session_unset();
        session_destroy();
    }

    /* Auth checks */
    public function isLoggedIn(): bool {
        $this->startSession();
        return isset($_SESSION['user_id']);
    }

    public function isAdmin(): bool {
        $this->startSession();
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public function isGuest(): bool {
        $this->startSession();
        return isset($_SESSION['role']) && $_SESSION['role'] === 'guest';
    }
}
