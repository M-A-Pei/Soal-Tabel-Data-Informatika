<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class OrderController extends BaseController
{

    public function insert(Request $request)
    {
        $customer_name = $request->input("customer_name");
        $order_date = $request->input("order_date");
        $items = $request->input("items");
    
        $orderId = DB::table('orders')->insertGetId([
            'customer_name' => $customer_name,
            'order_date' => $order_date,
        ]);
    
        foreach ($items as $item) {
            $quantity = $item['quantity'];
            $productId = $item['product_id'];
            $product = DB::table('products')->where('id', $productId)->first();
            if (!$product) {
                DB::table('orders')->where('id', $orderId)->delete();
                return response()->json("Product not found", 400);;
            }

            if($product->stock < $item['quantity']){
                DB::table('orders')->where('id', $orderId)->delete();
                return response()->json("Insufficient stock for product ID $productId", 400);
            }

            if($quantity < 1){
                DB::table('orders')->where('id', $orderId)->delete();
                return response()->json("quantity has to be atleast 1", 400);
            }

            $price = $product->price;
    
            DB::insert('insert into order_items (order_id, product_id, quantity, price) values (?, ?, ?, ?)', [$orderId, $productId, $quantity, $price * $quantity]);

            $product->current_stock = $product->current_stock - $quantity;
            DB::update('update products set current_stock = ? where id = ?', [$product->current_stock, $productId]);
        }

        return "Order created successfully";
    }
    

    public function getAll(){
        return DB::select('select * from orders LEFT JOIN order_items ON orders.id = order_items.product_id');
    }
}
