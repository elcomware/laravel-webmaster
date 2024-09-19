<?php

namespace Elcomwares\WebMaster\Tests;

use Elcomwares\WebMaster\WebMasterServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Elcomwares\\WebMaster\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            WebMasterServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        // Set up default user authentication for testing
        config()->set('auth.providers.users.model', \Elcomwares\WebMaster\Models\User::class);

        //$migration = include __DIR__.'/../database/migrations/create_webmaster_tables.php.stub';
        $migration = include __DIR__.'/../database/migrations/create_webmaster_tables.php';
        $migration = include __DIR__.'/../database/migrations/create_test_table.php';
        $migration->up();

    }
}
