<?php

namespace App\Dto\User;

final class UserFindDto
{
    /** @var string */
    private $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
}