<?php

namespace App\Dto\User;

final class UserUpdateDto
{
    /** @var string */
    private $name;
    
    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var string */
    private $id;
    
    public function __construct(
        $id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
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