<?php

/**
 * @Author: kidkang
 * @Date:   2021-03-09 07:48:22
 * @Last Modified by:   kidkang
 * @Last Modified time: 2021-03-09 07:49:21
 */
namespace Yjtec\Hashids\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use Yjtec\Hashids\HashidsServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            HashidsServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }

}
