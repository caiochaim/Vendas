<?php

namespace App\Http\Services;

use App\Model\Product;
use App\Validators\ValidateProduct;

class ProductService
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProducts()
    {
        return Product::all();
    }

    /**
     * @param $id
     * @return Product
     */
    public function getProduct($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * @param array $productRequest
     * @return string
     */
    public function createProduct(array $productRequest)
    {
        ValidateProduct::validateFields($productRequest);

        $product = new Product();
        $product->fillable(["productCode", "name", "price"])->fill($productRequest);

        $product->save();

        return 'Produto cadastrado com sucesso!';
    }

    /**
     * @param $data
     * @param $id
     * @return string
     */
    public function updateProduct($data, $id)
    {
        ValidateProduct::validateFields($data);

        $product = Product::find($id);
        $product->fill($data);
        $product->save();

        return 'Produto alterado com sucesso!';
    }

    /**
     * @param $id
     * @return string
     */
    public function destroyProduct($id)
    {
        $product = Product::find($id);

        ValidateProduct::validateFields($product);

        return json_encode($product->delete(), 204);
    }
}