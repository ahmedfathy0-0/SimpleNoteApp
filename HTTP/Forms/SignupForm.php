<?php
namespace HTTP\Forms;

use Core\Validator;

class SignupForm {

    protected $errors = [];

    public function validate($username, $email, $password) {

        if (empty($username)) {
            $this->errors[] = "Username is required.";
        }

        if (empty($email)) {
            $this->errors[] = "Email is required.";
        } elseif (!Validator::email($email)) {
            $this->errors[] = "Invalid email address.";
        }

        if (empty($password)) {
            $this->errors[] = "Password is required.";
        } elseif (!Validator::minLength($password, 6)) {
            $this->errors[] = "Password must be at least 6 characters.";
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}
