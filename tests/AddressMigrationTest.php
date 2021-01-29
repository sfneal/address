<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Models\Address;

class AddressMigrationTest extends TestCase
{
    /** @test */
    public function it_can_access_the_database()
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
