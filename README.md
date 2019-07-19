**CPF Validator**
==
A Laravel package to work with CPF validation.

CPF is an individual taxpayer identification number given to people living in Brazil, both native Brazilians and resident foreigners.

Installation
--

`` composer install thiagoprz/cpf-validator ``

Usage
--
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CpfController extends Controller
{
    ...
    /**
     * Store action
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cpf' => 'cpf', // CPF validation
            ...
        ]);
        ...
    }
    ...
}
```