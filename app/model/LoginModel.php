<?php

namespace App\model;

class LoginModel
{
    private string $reference_email = 'admin';
    private $reference_password_hash;

    public function __construct()
    {
        $this->reference_password_hash = password_hash('password', PASSWORD_DEFAULT);
    }

    public function verifyCredentials($email, $password): bool
    {
        return $email == $this->reference_email && password_verify($password, $this->reference_password_hash);
    }
}
