<?php

namespace Phpparallel\Repository;

use Phpparallel\ValueObjects\Person;

class PeopleRepository {

    /**
     * @return Person[]
     */
    public function load(): array
    {
        $peopleAsJson = file_get_contents(dirname(__DIR__, 2) . '/resources/people.json');        
        $peopleData = json_decode($peopleAsJson, true);

        return array_map(fn($data) => new Person($data['documento'], $data['nome'], $data['idade']),$peopleData);
    }
}