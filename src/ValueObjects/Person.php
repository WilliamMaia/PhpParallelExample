<?php

namespace Phpparallel\ValueObjects;

class Person {

    public function __construct(
        public string $document,
        public string $name,
        public int $age
    )
    {
        
    }
}