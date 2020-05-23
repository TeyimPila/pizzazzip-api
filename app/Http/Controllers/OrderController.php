<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return OrderResource::collection(Order::with(['orders'])->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return OrderResource
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     *
     * @return OrderResource
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return OrderResource
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->only(['name', 'type', 'description', 'image']));

        return new OrderResource($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }
}
