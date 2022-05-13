<?php

namespace App\Dto\User;

final class UserCreateDto
{
    /** @var string */
    private $name;
    
    /** @var string */
    private $email;

    /** @var string */
    private $passwors;
    
    public function __construct(
        string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
        
    public function getEmail() 
    {
        return $this->email;
    }

    public function getPassword() 
    {
        return $this->password;
    }
}