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

    /**
     * @test
     *
     * @dataProvider whereAddressLikeProvider
     */
    public function whereAddressLike(array $attributes)
    {
        $model = Address::factory()->create($attributes);

        $query = Address::query()->whereAddressLike($attributes['address_1']);
        $resultModel = $query->get()->first();
        $resultAttributes = $query->get(array_keys($attributes))->first()->toArray();

        $this->assertInstanceOf(AddressBuilder::class, $query);
        $this->assertInstanceOf(Address::class, $resultModel);
        $this->assertEquals($model->getKey(), $resultModel->getKey());
        $this->assertNotNull($resultAttributes);
        $this->assertIsArray($resultAttributes);
        $this->assertEquals($attributes, $resultAttributes);
    }

    /**
     * Retrieve an array of Address model attributes to use to create models.
     *
     * @return array[]
     */
    public static function whereAddressLikeProvider(): array
    {
        return [
            [
                [
                    'address_1' => '525 Park Ave',
                    'city' => 'New York',
                    'state' => 'NY',
                    'zip' => '10065',
                ],
            ],

            [
                [
                    'address_1' => '420 Broadway St',
                    'city' => 'Boston',
                    'state' => 'MA',
                    'zip' => '02892',
                ],
            ],

            [
                [
                    'address_1' => '134 Main St',
                    'city' => 'Chicago',
                    'state' => 'IL',
                    'zip' => '29301',
                ],
            ],
        ];
    }
}
