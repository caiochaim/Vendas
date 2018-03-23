<?php

namespace App\Http\Services;

use App\Model\Order;
use App\Validators\ValidateOrder;


class OrderService
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getOrders()
    {
        return Order::all();
    }

    /**
     * @param $id
     * @return Order
     */
    public function getOrder($id)
    {
        $order = Order::find($id);
        return $order;
    }

    /**
     * @param array $orderRequest
     * @return string
     */
    public function createOrder(array $orderRequest)
    {
        ValidateOrder::validateFields($orderRequest);

        $order = new Order();
        $order->fillable(['person', 'number', 'emission','total'])->fill($orderRequest);

        $order->save();

        return 'Pedido cadastrado com sucesso!';
    }

    /**
     * @param $data
     * @param $id
     * @return string
     */
    public function updateOrder($data, $id)
    {
        ValidateOrder::validateFields($data);

        $order = Order::find($id);
        $order->fill($data);
        $order->save();

        return 'Pedido alterado com sucesso!';
    }

    /**
     * @param $id
     * @return string
     */
    public function destroyOrder($id)
    {
        $order = Person::find($id);

        ValidateOrder::validateFields($order);

        return json_encode($order->delete(), 204);
    }
}