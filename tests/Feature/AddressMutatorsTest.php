<?php


namespace Sfneal\Address\Tests\Feature;


use Sfneal\Address\Models\Address;
use Sfneal\Address\Tests\TestCase;
use Sfneal\Queries\RandomModelAttributeQuery;

class AddressMutatorsTest extends TestCase
{
    /** @test */
    public function set_city_state()
    {
        $address_id = (new RandomModelAttributeQuery(Address::class, 'address_id'))->execute();
        $address = Address::query()->find($address_id);

        $address->update([
            'city' => 'Boston, MA'
        ]);

        $updatedAddress = Address::query()->find($address_id);
        $this->assertNotNull($updatedAddress);
        $this->assertInstanceOf(Address::class, $updatedAddress);
        $this->assertSame('Boston', $updatedAddress->city);
        $this->assertSame('MA', $updatedAddress->state);
    }
}
