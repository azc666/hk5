<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CartConfirmOrderController extends Controller
{
    public function showConfirmOrder(Request $request) {
        $rush = $request->rush;
        
        if ($request->rushDate == Carbon::now()->format('Y-m-d')) {
            $dt_rush = 'ASAP';
        } else {
            $dt_rush = Carbon::parse($request->rushDate)->format('l, F d, Y');
        }
        // dd(Carbon::now()->format('Y-m-d'));
        // dd($dt_rush . '<br>' . Carbon::now());

        return view('cart/cartConfirm', compact('request', 'dt_rush', 'rush'));
    }
} 
