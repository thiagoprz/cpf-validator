<?php

namespace Thiagoprz\CpfValidator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class CpfServiceProvider
 * @package Thiagoprz\CpfValidator
 */
class CpfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/lang/', 'cpf-validator');
        $message = trans('validation.cpf') != 'validation.cpf' ? trans('validation.cpf') : trans('cpf-validator::validation.cpf');
        Validator::extend('cpf', 'Thiagoprz\CpfValidator\Cpf@passes', $message);
    }

}