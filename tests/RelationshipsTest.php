<?php

namespace Sfneal\Address\Tests;

use Sfneal\Address\Tests\Models\People;

class RelationshipsTest extends TestCase
{
    /**
     * @var People
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
        $this->model = People::query()->get()->shuffle()->first();
    }

    /** @test */
    public function address_relationship_exists()
    {
        $this->assertNotNull($this->model->relationLoaded('address'));
    }
}
