<?php

namespace Sfneal\Address\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\Address\Models\Address;
use Sfneal\Address\Providers\AddressServiceProvider;
use Sfneal\Address\Tests\Models\People;
use Sfneal\Address\Tests\Providers\TestingServiceProvider;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [
            TestingServiceProvider::class,
            AddressServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Migrate 'people' table
        include_once __DIR__.'/migrations/create_people_table.php.stub';
        (new \CreatePeopleTable())->up();

        // Migrate address table
        include_once __DIR__.'/../database/migrations/create_address_table.php.stub';
        (new \CreateAddressTable())->up();
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Create model factories
        Address::factory()
            ->count(20)
            ->for(People::factory(), 'addressable')
            ->create();
    }
}
