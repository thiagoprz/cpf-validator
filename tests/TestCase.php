<?php

namespace Thiagoprz\CpfValidator\Test;

use Thiagoprz\CpfValidator\CpfServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{

    /**
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return \Thiagoprz\CpfValidator\CpfServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [CpfServiceProvider::class];
    }

}