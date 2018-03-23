<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    /**
     * Display a listing of the resource.
     */
    public function getProducts()
    {
        $result = $this->productService->getProducts();
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return string
     */
    public function getProduct($id)
    {
        $result = $this->productService->getProduct($id);
        return json_encode($result);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return string
     */
    public function createProduct(Request $request)
    {
        $result = $this->productService->createProduct($request->all());
        return $result;
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return string
     */
    public function updateProduct(Request $request, $id)
    {
        $data = $request->all();

        $result = $this->productService->updateProduct($data, $id);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return string
     */
    public function destroyProduct($id)
    {
        $result = $this->productService->destroyProduct($id);
        return $result;
    }
}
