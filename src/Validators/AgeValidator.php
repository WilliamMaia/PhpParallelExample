<?php

namespace Phpparallel\Validators;

use Phpparallel\ValueObjects\Person;

class AgeValidator {

    public function __invoke(Person $pessoa)
    {   
        // 100 millisegundos
        usleep(1000 * 100);

        return true;
    }
}