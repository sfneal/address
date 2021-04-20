<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Models\Address;
use Sfneal\Address\Tests\Models\People;

class MigrationsTest extends TestCase
{
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
        $this->assertSame($newAddress->address_full, '123 Main Street, Boston, MA 12345');
    }
}
