<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class ReorderController extends Controller
{
    public function showEdit(Request $request, Product $product)
    {
        $order = Order::get(['confirmation']);
        dd($order);
        return view('products/editReorder', compact('request', 'product'));
    }
    
}
