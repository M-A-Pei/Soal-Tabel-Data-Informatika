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


    public function getAll() {
        $result = DB::select("
           SELECT
                CONCAT(
                    '{\"customer_name\":\"', orders.customer_name, '\",',
                    '\"order_date\":\"', orders.order_date, '\",',
                    '\"total_items\":', SUM(order_items.quantity), ',',
                    '\"total_price\":', SUM(order_items.price * order_items.quantity), ',',
                    '\"items\":[',
                        GROUP_CONCAT(
                            CONCAT(
                                '{\"product_id\":', order_items.product_id, ',',
                                '\"product_name\":\"', products.name, '\",',
                                '\"subtotal_price\":', order_items.price, ',',
                                '\"quantity\":', order_items.quantity, '}'
                            )
                        ),
                    ']}'
                ) AS layered_response
            FROM
                orders
            JOIN
                order_items ON orders.id = order_items.order_id
            JOIN
                products ON order_items.product_id = products.id
            GROUP BY
                orders.id, orders.customer_name, orders.order_date;


        ");

        $jsonResult = [];
        foreach ($result as $row) {
            $jsonResult[] = json_decode($row->layered_response, true);
        }

        return $jsonResult;
    }

}
