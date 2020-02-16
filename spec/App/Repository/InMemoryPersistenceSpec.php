<?php

namespace spec\App\Repository;


use PhpSpec\ObjectBehavior;
use App\Repository\InMemoryPersistence;

class InMemoryPersistenceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(InMemoryPersistence::class);
    }

    function it_store_data_and_retrive_it_latter()
    {
        $newId = $this->generateId();
        $this->persist(['New Data']);
        $this->retrieve($newId)->shouldBe(['New Data']);
    }

    function it_delete_exising_item()
    {
        $newId = $this->generateId();
        $this->persist(['New Data']);
        $this->delete($newId);

        $allPersistedData = $this->retrieveAll();
        $allPersistedData->shouldHaveCount(0);
    }
}
