<?php

/**
 * @Author: kidkang
 * @Date:   2021-03-09 07:32:04
 * @Last Modified by:   kidkang
 * @Last Modified time: 2021-03-09 07:39:49
 */
namespace Yjtec\Hashids;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class HashidsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setupConfig();
    }

    protected function setupConfig(): void
    {
        $source = realpath($raw = __DIR__ . '/../config/hashids.php') ?: $raw;

        $this->publishes([$source => config_path('hashids.php')], 'config');

        $this->mergeConfigFrom($source, 'hashids');
    }

    public function register(): void
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    protected function registerFactory(): void
    {
        $this->app->singleton('hashids.factory', function () {
            return new HashidsFactory();
        });

        $this->app->alias('hashids.factory', HashidsFactory::class);
    }

    protected function registerManager(): void
    {
        $this->app->singleton('hashids', function (Container $app) {
            $config = $app['config'];
            $factory = $app['hashids.factory'];

            return new HashidsManager($config, $factory);
        });

        $this->app->alias('hashids', HashidsManager::class);
    }

    protected function registerBindings(): void
    {
        $this->app->bind('hashids.connection', function (Container $app) {
            $manager = $app['hashids'];

            return $manager->connection();
        });

        $this->app->alias('hashids.connection', Hashids::class);
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'hashids',
            'hashids.factory',
            'hashids.connection',
        ];
    }
}
