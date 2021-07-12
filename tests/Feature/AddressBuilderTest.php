<?php


namespace Sfneal\Address\Tests\Feature;


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
}
