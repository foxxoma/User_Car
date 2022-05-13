<?php

namespace App\Dto\Car;

final class CarCreateDto
{
    /** @var string */
    private $name;
    
    /** @var int */
    private $userId;
    
    public function __construct(
        string $name, $userId = null)
    {
        $this->name = $name;
        $this->userId = $userId;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
        
    public function getUserId() 
    {
        return $this->userId;
    }
}