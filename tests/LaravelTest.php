<?php

namespace Sfneal\Address\Tests;

use Orchestra\Testbench\TestCase;
use Sfneal\Address\Providers\AddressServiceProvider;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return AddressServiceProvider::class;
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_address_table.php.stub';

        (new \CreateAddressTable())->up();
    }
}
