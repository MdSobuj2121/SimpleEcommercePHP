<?php
class User {
    public $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public static function authenticate($username, $password) {
        $users = json_decode(file_get_contents('data/users.json'), true);
        foreach ($users as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                return new self($username, $password);
            }
        }
        return null;
    }
}
?>
