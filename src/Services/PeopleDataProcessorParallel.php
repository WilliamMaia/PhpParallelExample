<?php

$startTime = microtime(true);

require_once 'vendor/autoload.php';

use Phpparallel\Repository\PeopleRepository;
use Phpparallel\Validators\AgeValidator;
use Phpparallel\Validators\DocumentValidator;

use Amp\Parallel\Worker;
use Amp\Promise;

$peopleRepository = new PeopleRepository();
$people = $peopleRepository->load();

$promisesAges = [];
$promisesDocuments = [];

foreach($people as $index => $person) {
    $promisesAges[$index] = Worker\enqueueCallable((new AgeValidator()), $person);
    $promisesDocuments[$index] = Worker\enqueueCallable((new DocumentValidator()), $person);
}

$responsesAges = Promise\wait(Promise\all($promisesAges));
$responsesDocuments = Promise\wait(Promise\all($promisesDocuments));

// foreach ($responses as $url => $response) {
//     \printf("Read %d bytes from %s\n", \strlen($response), $url);
// }

var_dump(
    json_encode(
        [
            'memoria' => (memory_get_peak_usage() / 1024 / 1024),
            'tempo'    => ((microtime(true) - $startTime))
        ],
        JSON_PRETTY_PRINT
    )
);