<?php

namespace Sfneal\Address\Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Sfneal\Address\Models\Address;
use Sfneal\Address\Tests\TestCase;
use Sfneal\Testing\Utils\Interfaces\Factory\AttributesTest;
use Sfneal\Testing\Utils\Interfaces\Factory\FillablesTest;
use Sfneal\Testing\Utils\Interfaces\Factory\RelationshipAttributesTest;
use Sfneal\Testing\Utils\Interfaces\Factory\RelationshipFillablesTest;

class FactoriesTest extends TestCase implements FillablesTest, AttributesTest, RelationshipAttributesTest, RelationshipFillablesTest
{
    /**
     * @var Address
     */
    public $model;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Retrieve the People model from an Address model
        $this->model = Address::query()->get()->shuffle()->first();
    }

    #[Test]
    public function fillables_are_correct_types()
    {
        $this->assertIsString($this->model->type);
        $this->assertIsString($this->model->address_1);
        $this->assertIsString($this->model->address_2);
        $this->assertIsString($this->model->city);
        $this->assertIsString($this->model->state);
        $this->assertIsString($this->model->zip);
        $this->assertIsString($this->model->address_full);
    }

    #[Test]
    public function attributes_are_correct_types()
    {
        // Name attributes
        $this->assertIsString($this->model->address_full);
        $this->assertStringContainsString(', ', $this->model->address_full);
        $this->assertStringContainsString($this->model->address_1, $this->model->address_full);
        $this->assertStringContainsString($this->model->city, $this->model->address_full);
        $this->assertStringContainsString($this->model->state, $this->model->address_full);
        $this->assertStringContainsString($this->model->zip, $this->model->address_full);
    }

    #[Test]
    public function relationship_fillables_are_correct_types()
    {
        $this->assertIsString($this->model->addressable->name_first);
        $this->assertIsString($this->model->addressable->name_last);
        $this->assertStringContainsString('@', $this->model->addressable->email);
        $this->assertIsInt($this->model->addressable->age);
    }

    #[Test]
    public function relationship_attributes_are_correct_types()
    {
        // Name attributes
        $this->assertIsString($this->model->addressable->getNameFullAttribute());
        $this->assertStringContainsString(', ', $this->model->addressable->getNameLastFirstAttribute());
        $this->assertStringContainsString($this->model->addressable->name_first, $this->model->addressable->getNameFullAttribute());
        $this->assertStringContainsString($this->model->addressable->name_last, $this->model->addressable->getNameFullAttribute());
    }
}
