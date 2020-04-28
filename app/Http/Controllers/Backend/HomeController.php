<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Product;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Category;
class HomeController extends Controller
{
    //
    public function getHome()
    {
        // $user = user::all();
        // if (Auth::check()) {
        //     if (Auth::user()->level == 1) {
        //         return view('backend.dashboard');
        //     } else {
        //         return redirect()->route('getPage');
        //     }
        // } else {
        //     return redirect()->route('getLogin');
        // }
        return view('backend.dashboard');
    }
    public function getThongke()
    {
        $product_count = Product::count();
        $order_count = Bill::count();
        $user_count = User::count();
        $category_count = Category::count();

        $customer_order = BillDetail::orderBy('id', 'desc')->paginate(5);
        return view('backend.thongke', compact('product_count', 'order_count', 'user_count', 'category_count', 'customer_order'));
    }
}
