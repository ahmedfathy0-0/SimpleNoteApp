<?php

namespace Core;

class Authenticator
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username, $password)
    {
        $user = $this->db->authenticateUser($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function signup($username, $email, $password)
    {
        return $this->db->registerUser($username, $email, $password);
    }
}
