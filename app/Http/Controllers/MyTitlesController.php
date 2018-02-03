<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitleController extends Controller
{
    //
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use DB;
use Yajra\Datatables\Facades\Datatables;
use App\Title;

class MyTitlesController extends Controller
{
    public function index()
    {
        if (Auth::user()->admin == '1') {
            $titles = Title::all();
        } else {
            $titles = Auth::user()->title;
        }

        return view('user.titles', compact('titles', 'users', 'types'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function mytitlesData()
    {
        return Datatables::of(Order::query())->make(true);
    }
}
