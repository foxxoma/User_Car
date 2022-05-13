<?php

namespace App\Dto\Car;

final class CarFindDto
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