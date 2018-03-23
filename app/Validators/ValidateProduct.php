<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ValidateProduct
{
    /**
     * @param $product
     */
    public static function validateFields($product)
    {
        $validator = Validator::make($product, [
            'productCode' => 'required|unique:products|max:10|string',
            'name' => 'required|unique:products|max:50|string',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            abort(500, 'Insert not allowed');
        }

        if ($product["price"] <= 0)
            abort(500, 'the price must be greater than zero');
    }
}