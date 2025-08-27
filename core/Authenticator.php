<?php

namespace Core;

require_once __DIR__ . '/Session.php';

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
            Session::set('user_id', $user['user_id']);
            Session::set('username', $user['username']);
            return true;
        }
        return false;
    }

    public function logout()
    {
        Session::unset('user_id');
        Session::unset('username');
        Session::destroy();
    }

    public function signup($username, $email, $password)
    {
        return $this->db->registerUser($username, $email, $password);
    }
}
