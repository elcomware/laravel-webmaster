<?php

namespace Elcomwares\WebMaster;

use Elcomwares\WebMaster\Commands\WebMasterCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WebMasterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-webmaster')
            ->hasConfigFile()
            ->hasViews()

            ->hasTranslations()
            ->hasAssets()
            ->publishesServiceProvider('WebMasterServiceProvider')
            ->hasRoute('webmaster')

            ->hasMigration('create_laravel-webmaster_table')
            ->hasCommand(WebMasterCommand::class)

            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishAssets()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->askToStarRepoOnGitHub();
            });
    }
}
