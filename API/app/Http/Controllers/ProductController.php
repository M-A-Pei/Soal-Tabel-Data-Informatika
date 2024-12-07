<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ProductController extends BaseController
{
    private $insertRules = [
        'name' => 'required|string|min:3',
        'stock' => 'required|integer|min:1',
        'price' => 'required|integer|min:0',
    ];

    public function insert(Request $request){

        $validator = Validator::make($request->all(), $this->insertRules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $name = $request->input("name");
        $stock = $request->input("stock");
        $price = $request->input("price");

        return DB::insert('insert into products (name, stock, current_stock ,price) values (?, ?, ?, ?)', [$name, $stock, $stock, $price]);
    }

    public function getAll(){
        return DB::select('select * from products');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), $this->insertRules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $name = $request->input("name");
        $stock = $request->input("stock");
        $price = $request->input("price");

        DB::update('update products set stock = ?, price = ?, name = ? where id = ?', [$stock, $price, $name, $id]);
    }

    public function delete($id){
        DB::delete('delete from products where id = ?', [$id]);
    }
}
