<?php

namespace Sfneal\Address\Tests;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\Address\Models\Address;
use Sfneal\Address\Providers\AddressServiceProvider;
use Sfneal\Address\Tests\Models\People;
use Sfneal\Address\Tests\Providers\TestingServiceProvider;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    /**
     * @var Address|Collection
     */
    public $models;

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
        $this->models = Address::factory()
            ->count(20)
            ->for(People::factory(), 'addressable')
            ->create();

        // Add custom factories
        $this->addCustomFactories();
    }

    /**
     * Add custom Factories to the model Collection.
     *
     * @return array
     */
    private static function customFactories(): array
    {
        return [
            Address::factory()
                ->for(
                    People::factory()->create([
                        'name_first' => 'Stephen',
                        'name_last' => 'Neal',
                    ]),
                    'addressable'
                ),
            People::factory()
                ->for(
                    People::factory()->create([
                        'name_first' => 'Richard',
                        'name_last' => 'Neal',
                    ]),
                    'address'
                ),
        ];
    }

    /**
     * Add custom factories to the Model Collection.
     *
     * @return void
     */
    private function addCustomFactories(): void
    {
        foreach (self::customFactories() as $factory) {
            $this->models->add($factory);
        }
    }
}
