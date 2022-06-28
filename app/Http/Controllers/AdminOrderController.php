<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAdmin()){
            $orders = Order::with('user')->orderBy('updated_at', 'ASC')->paginate(25);
        }else{
            $orders = Order::where('user_id', Auth::user()->id)->orderBy('updated_at', 'ASC')->paginate(25);
        }

        return view('admin.orders.index',compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

        $orders = Order::findOrFail($id);

        return view('admin.orders.show',compact('orders'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
