<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Models\Address;

class FactoriesTest extends TestCase
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
        $this->model = $this->models->random();
    }

    /** @test */
    public function address_fillables_are_correct_types()
    {
        $this->assertIsString($this->model->type);
        $this->assertIsString($this->model->address_1);
        $this->assertIsString($this->model->address_2);
        $this->assertIsString($this->model->city);
        $this->assertIsString($this->model->state);
        $this->assertIsString($this->model->zip);
    }

    /** @test */
    public function people_fillables_are_correct_types()
    {
        $this->assertIsString($this->model->addressable->name_first);
        $this->assertIsString($this->model->addressable->name_last);
        $this->assertStringContainsString('@', $this->model->addressable->email);
        $this->assertIsInt($this->model->addressable->age);
    }

    /** @test */
    public function people_attributes_are_correct_types()
    {
        // Name attributes
        $this->assertIsString($this->model->addressable->name_full);
        $this->assertStringContainsString(', ', $this->model->addressable->name_last_first);
        $this->assertStringContainsString($this->model->addressable->name_first, $this->model->addressable->name_full);
        $this->assertStringContainsString($this->model->addressable->name_last, $this->model->addressable->name_full);
    }
}
