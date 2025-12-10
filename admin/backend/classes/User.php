<?php
require_once 'Database.php';

class User extends Database {

    /*starts session*/
    public function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /*check if username exists */
    public function usernameExists($username) {
        $sql = "SELECT COUNT(*) AS username_count FROM users WHERE username = ?";
        $count = $this->executeQuerySingle($sql, [$username]);
        return $count['username_count'] > 0;
    }

    /*Register, only superadmins can create admins*/
    public function registerUser($username, $email, $password, $role = 'admin', $created_by = null) {
        // Only allow creation of Admin accounts by a Superadmin
        if ($role === 'admin' && $created_by !== null) {
            throw new Exception("Only system setup can create a superadmin account.");
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password, role, account_status, date_added, created_by) 
                VALUES (?, ?, ?, ?, 'active', NOW(), ?)";
        try {
            $this->executeNonQuery($sql, [$username, $email, $hashed_password, $role, $created_by]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    /*Login through email */
    public function loginUser($email, $password) {
        $sql = "SELECT user_id, username, password, role, account_status 
                FROM users WHERE email = ?";
        $user = $this->executeQuerySingle($sql, [$email]);

        if ($user && password_verify($password, $user['password'])) {
            if ($user['account_status'] !== 'active') {
                return "suspended";
            }

            $this->startSession();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }
    /*Login through username */
    public function loginUserByUsername($username, $password) {
    $sql = "SELECT user_id, username, password, role, account_status 
            FROM users WHERE username = ?";
    $user = $this->executeQuerySingle($sql, [$username]);

    if ($user && password_verify($password, $user['password'])) {
        if ($user['account_status'] !== 'active') {
            return "suspended";
        }

        $this->startSession();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}


    /*Logout */
    public function logout() {
        $this->startSession();
        session_unset();
        session_destroy();
    }

    /*Checks if logged in */
    public function isLoggedIn() {
        $this->startSession();
        return isset($_SESSION['user_id']);
    }

    /*checks if the role is admin */
    public function isAdmin() {
        $this->startSession();
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    /*checks if the role is superadmin */
    public function isGuest() {
        $this->startSession();
        return isset($_SESSION['role']) && $_SESSION['role'] === 'guest';
    }
}
?>
