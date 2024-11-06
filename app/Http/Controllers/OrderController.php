<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar la entrada
            $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,idProduct',
            'products.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'payment_method_id' => 'required|exists:payment_methods,idPaymentMethod',
        ]);

        DB::beginTransaction();

        try {
            // Crear el pedido
            $order = new Order();
            $order->order_code = Str::uuid(); // Código único
            $order->total = $validated['total'];
            $order->idUser = auth()->id();
            $order->idStatus = 1; // Estado predeterminado
            $order->idPaymentMethod = 1;
            $order->payment_date = now();
            $order->save();

            // Crear los detalles del pedido
            foreach ($validated['products'] as $productData) {
                $product = Product::find($productData['id']);

                // Verificar stock suficiente
                if ($product->stock < $productData['quantity']) {
                    throw new \Exception("Stock insuficiente para el producto {$product->name}");
                }

                // Crear el detalle del pedido
                $orderDetail = new OrderDetail();
                $orderDetail->idOrder = $order->idOrder;
                $orderDetail->idProduct = $product->idProduct;
                $orderDetail->quantity = $productData['quantity'];
                $orderDetail->unit_price = $product->price;
                $orderDetail->save();

                // Restar del stock
                $product->stock -= $productData['quantity'];
                $product->save();
            }

            DB::commit();

            return response()->json(['message' => 'Pedido creado exitosamente'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
                return response()->json(['error' => $e->getMessage()], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
