<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Models\Address;

class AddressFactoryTest extends TestCase
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
    public function fillables_are_correct_types()
    {
        $this->assertIsString($this->model->type);
        $this->assertIsString($this->model->address_1);
        $this->assertIsString($this->model->address_2);
        $this->assertIsString($this->model->city);
        $this->assertIsString($this->model->state);
        $this->assertIsString($this->model->zip);
    }
}
