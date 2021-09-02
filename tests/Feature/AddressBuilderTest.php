<?php

namespace Sfneal\Address\Tests\Feature;

use Sfneal\Address\Builders\AddressBuilder;
use Sfneal\Address\Models\Address;
use Sfneal\Address\Tests\TestCase;
use Sfneal\Queries\RandomModelAttributeQuery;

class AddressBuilderTest extends TestCase
{
    /** @test */
    public function whereType()
    {
        $attribute = 'addressable_type';
        $value = (new RandomModelAttributeQuery(Address::class, $attribute))->execute();
        $model = Address::query()->whereType($value)->get();

        $this->assertContains($value, $model->pluck($attribute));
    }

    /** @test  */
    public function whereAddressLike()
    {
        $attributes = [
            'address_1' => '525 Park Ave',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '10065',
        ];
        $model = Address::factory()->create($attributes);

        $search = '525 Park Ave';
        $query = Address::query()->whereAddressLike($search);
        $resultModel = $query->get()->first();
        $resultAttributes = $query->get(array_keys($attributes))->first()->toArray();

        $this->assertInstanceOf(AddressBuilder::class, $query);
        $this->assertInstanceOf(Address::class, $resultModel);
        $this->assertEquals($model->getKey(), $resultModel->getKey());
        $this->assertNotNull($resultAttributes);
        $this->assertIsArray($resultAttributes);
        $this->assertEquals($attributes, $resultAttributes);
    }
}
