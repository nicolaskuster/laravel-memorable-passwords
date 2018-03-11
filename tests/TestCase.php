<?php


namespace Nicolaskuster\MemorablePasswords\Tests;

use Nicolaskuster\MemorablePasswords\Providers\MemorablePasswordServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MemorablePasswordServiceProvider::class
        ];
    }
}