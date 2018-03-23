<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ValidateOrder
{
    /**
     * @param $order
     */
    public static function validateFields($order)
    {
        $validator = Validator::make($order, [
            'person' => 'required|unique:orders',
            'number' => 'required|unique:orders|integer',
            'emission' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            abort(500, 'Insert not allowed');
        }
    }
}