<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use DB;
use Yajra\Datatables\Facades\Datatables;

class MyOrdersController extends Controller
{
    
    // public $orders;

    public function index()
    {
        if (Auth::user()->admin == '1') {
            $orders = Order::all();
        } else {
            $orders = Auth::user()->orders;
        }

        return view('user.myorders', compact('orders', 'users'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function myordersData()
    {
        return Datatables::of(Order::query())->make(true);
    }

    public function show(Order $orders, Request $request)
    {
        // $order = Order::find($id);
        // if (Auth::user()->admin == '1') {
        //     $ordersList = App\Order::all();
        //     // dd(Auth::user()->admin);
        // } else {
        //     $ordersList = Auth::user()->orders;
        // }
        // dd($ordersList);
        // $orders = App\Order::all();
        // $orders = Auth::user()->orders;
        // dd($id);
        // $confirm = $orders->first()->confirmation;
        //dd($confirm);
        // $confirmEmail = Order::where('confirmation', $confirm )->first();
        // $conf = '200-17729-16505';
        // $conf = Order::where('confirmation', $confirm)->first();
        $showOrder = $request->confirm;
        $confirmEmail = Order::where('confirmation', $showOrder )->first();
        // echo $confirmEmail->cart;
        // exit();
        // $confirm = $orders->confirmation;
        
        return view('user.showConfirmedOrder', compact('showOrder', 'orders', 'confirmEmail', 'ordersList'));
    }

}
