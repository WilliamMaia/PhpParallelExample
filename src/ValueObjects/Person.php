<?php

namespace Phpparallel\ValueObjects;

class Person {

    public $document;
    public $name;
    public $age;
    
    public function __construct(
        string $document,
        string $name,
        int $age
    )
    {
        $this->document = $document;
        $this->name = $name;
        $this->age = $age;
    }
}