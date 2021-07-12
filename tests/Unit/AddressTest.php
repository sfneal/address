<?php


namespace Sfneal\Address\Tests\Unit;


use Database\Factories\AddressFactory;
use Sfneal\Address\Builders\AddressBuilder;
use Sfneal\Address\Models\Address;
use Sfneal\Address\Tests\TestCase;
use Sfneal\Queries\RandomModelAttributeQuery;
use Sfneal\Testing\Models\People;
use Sfneal\Testing\Utils\Interfaces\CrudModelTest;
use Sfneal\Testing\Utils\Interfaces\ModelBuilderTest;
use Sfneal\Testing\Utils\Interfaces\ModelFactoryTest;
use Sfneal\Testing\Utils\Interfaces\ModelRelationshipsTest;

class AddressTest extends TestCase implements CrudModelTest, ModelBuilderTest, ModelFactoryTest, ModelRelationshipsTest
{
    /** @test */
    public function records_can_be_created()
    {
        $address = Address::factory()->create();

        $this->assertNotNull($address);
        $this->assertInstanceOf(Address::class, $address);
    }

    /** @test */
    public function records_can_be_updated()
    {
        $data = [
            'address_1' => '100 Legends Way',
            'address_2' => null,
            'city' => 'Boston',
            'state' => 'MA',
            'zip' => '02114',
        ];
        $address_id = (new RandomModelAttributeQuery(Address::class, 'address_id'))->execute();
        $address = Address::query()->find($address_id);
        $address->update($data);

        $updatedAddress = Address::query()->find($address_id);
        $this->assertNotNull($updatedAddress);
        $this->assertInstanceOf(Address::class, $updatedAddress);
        $this->assertSame($address->getKey(), $updatedAddress->getKey());
        $this->assertEquals($address->created_at, $updatedAddress->created_at);
        $this->assertEquals($address->updated_at, $updatedAddress->updated_at);

        foreach ($data as $key => $value) {
            $this->assertSame($value, $updatedAddress->{$key});
        }

        $this->assertSame('100 Legends Way, Boston, MA 02114', $updatedAddress->address_full);
    }

    /** @test */
    public function records_can_be_deleted()
    {
        $address_id = (new RandomModelAttributeQuery(Address::class, 'address_id'))->execute();
        $address = Address::query()->find($address_id);

        $address->delete();

        $this->assertInstanceOf(Address::class, $address);
        $this->assertTrue($address->wasDeleted());
        $this->assertNull(Address::query()->find($address_id));
    }

    /** @test */
    public function builder_is_accessible()
    {
        $builder = Address::query();

        $this->assertInstanceOf(AddressBuilder::class, $builder);
        $this->assertIsString($builder->toSql());
    }

    /** @test */
    public function factory_is_accessible()
    {
        $factory = Address::factory();

        $this->assertInstanceOf(AddressFactory::class, $factory);
    }

    /** @test */
    public function relationships_are_accessible()
    {
        $address_id = (new RandomModelAttributeQuery(Address::class, 'address_id'))->execute();
        $address = Address::query()->find($address_id);

        $this->assertNotNull($address->addressable);
        $this->assertInstanceOf(People::class, $address->addressable);
    }
}
