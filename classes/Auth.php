<?php
class Auth {
    public static function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    public static function login($username, $password) {
        $user = User::authenticate($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public static function logout() {
        unset($_SESSION['user']);
    }
}
?>
