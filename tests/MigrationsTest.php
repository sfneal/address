<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Models\Address;
use Sfneal\Address\Tests\Models\People;

class MigrationsTest extends TestCase
{
    /** @test */
    public function people_table_is_accessible()
    {
        // Save a new Address
        $person = new People();
        $person->name_first = 'Johnny';
        $person->name_last = 'Tsunami';
        $person->email = 'johnny.tsunami@example.com';
        $person->age = 22;
        $person->save();

        // Retrieve the new Address
        $newPerson = People::query()->find($person->person_id);

        // Assert Jokes are the same
        $this->assertSame($newPerson->name_first, 'Johnny');
        $this->assertSame($newPerson->name_last, 'Tsunami');
        $this->assertSame($newPerson->email, 'johnny.tsunami@example.com');
        $this->assertSame($newPerson->age, 22);
    }

    /** @test */
    public function address_table_is_accessible()
    {
        // Save a new Address
        $address = new Address();
        $address->type = 'primary';
        $address->address_1 = '123 Main Street';
        $address->city = 'Boston';
        $address->state = 'MA';
        $address->zip = '12345';
        $address->save();

        // Retrieve the new Address
        $newAddress = Address::query()->find($address->address_id);

        // Assert Jokes are the same
        $this->assertSame($newAddress->address_1, '123 Main Street');
        $this->assertSame($newAddress->city, 'Boston');
        $this->assertSame($newAddress->state, 'MA');
        $this->assertSame($newAddress->zip, '12345');
    }
}
