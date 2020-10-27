<?php


namespace Sfneal\Address\Providers;


use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migration file (if not already published)
        if (! class_exists('CreateAddressTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_address_table.php.stub' => database_path(
                    'migrations/'.date('Y_m_d_His', time()).'_create_address_table.php'
                ),
            ], 'migration');
        }
    }
}
