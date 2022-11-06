<?php

$startTime = microtime(true);

require_once 'vendor/autoload.php';

use Phpparallel\Repository\PeopleRepository;
use Phpparallel\Validators\AgeValidator;
use Phpparallel\Validators\DocumentValidator;

$peopleRepository = new PeopleRepository();

$people = $peopleRepository->load();

foreach($people as $person) {
    (new AgeValidator())($person); // 100 millisegundos
    (new DocumentValidator())($person); // 100 millisegundos
}

var_dump(
    json_encode(
        [
            'memoria' => (memory_get_peak_usage() / 1024 / 1024),
            'tempo'    => ((microtime(true) - $startTime))
        ],
        JSON_PRETTY_PRINT
    )
);