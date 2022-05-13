<?php

namespace App\Dto\Car;

final class CarUpdateDto
{
    /** @var string */
    private $name;
    
    /** @var int */
    private $userId;

    /** @var string */
    private $id;
    
    public function __construct(
        $id, $name, $userId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->userId = $userId;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
        
    public function getUserId() 
    {
        return $this->userId;
    }
}