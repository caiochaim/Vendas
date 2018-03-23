<?php

namespace App\Http\Controllers;

use App\Http\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    /**
     * Display a listing of the resource.
     */
    public function getOrders()
    {
        $result = $this->orderService->getOrders();
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return string
     */
    public function getOrder($id)
    {
        $result = $this->orderService->getOrder($id);
        return json_encode($result);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return string
     */
    public function createOrder(Request $request)
    {
        $result = $this->orderService->createOrder($request->all());
        return $result;
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return string
     */
    public function updateOrder(Request $request, $id)
    {
        $data = $request->all();

        $result = $this->orderService->updateOrder($data, $id);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return string
     */
    public function destroyOrder($id)
    {
        $result = $this->orderService->destroyOrder($id);
        return $result;
    }
}
