<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ValidatePerson
{
    /**
     * @param $person
     */
    public static function validateFields($person)
    {
        $validator = Validator::make($person, [
            'name' => 'required|unique:people|max:50|string',
            'cpf' => 'required|unique:people|max:15|string|cpf',
            'birthDate' => 'required|date'
        ]);

        if ($validator->fails()) {
            abort(500, 'Insert not allowed');
        }
    }
}