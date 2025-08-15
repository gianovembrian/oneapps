<?php
// namespace App\Authenticationion\PasswordHasher;
namespace App\PasswordHasher;

use Authentication\PasswordHasher\AbstractPasswordHasher;

class PhpassPasswordHasher extends AbstractPasswordHasher
{
    public function hash($password)
    {
        // your code
        return 'xyz';
    }

    public function check($password, $hashedPassword)
    {
        // your code
        return true;
    }
}