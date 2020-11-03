<?php

namespace Thiagoprz\CpfValidator;


use Illuminate\Validation\Rule;

/**
 * Class Cpf
 * @package Thiagoprz\CpfValidator
 */
class Cpf extends Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value, $parameters = [])
    {
        if (!empty($parameters) && $parameters[0] == true) {
            return true;
        }
        // Extracting only numbers since the value can be using a mask
        $cpf = preg_replace( '/[^0-9]/is', '', $value);
        // Check size number
        if (strlen($cpf) != 11) {
            return false;
        }
        // Avoiding repeated digits. (111.111.111-11)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Validating based on the calculation of the CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('cpf-validator::validation.cpf');
    }
}
