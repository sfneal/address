<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Tests\Models\People;

class PeopleMigrationTest extends TestCase
{
    /** @test */
    public function it_can_access_the_database()
    {
        // Save a new Address
        $person = new People();
        $person->name_first = 'Johnny';
        $person->name_last = 'Tsunami';
        $person->email = 'johnny.tsunami@example.com';
        $person->age = 22;;
        $person->save();

        // Retrieve the new Address
        $newPerson = People::query()->find($person->person_id);

        // Assert Jokes are the same
        $this->assertSame($newPerson->name_first, 'Johnny');
        $this->assertSame($newPerson->name_last, 'Tsunami');
        $this->assertSame($newPerson->email, 'johnny.tsunami@example.com');
        $this->assertSame($newPerson->age, 22);
    }
}
