<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendAdminController extends Controller
{
    public function index() {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::where('role_as', 0)->count();
        $orderCount = Order::count();
        $completeOrderCount = Order::where('status', 1)->count();
        $pendingOrderCount = Order::where('status', 0)->count();
        $userID = Auth::id();
        $user = User::find($userID);

        return view('admin.index', compact('productCount','user', 'categoryCount', 'userCount', 'orderCount', 'completeOrderCount', 'pendingOrderCount'));
    }
}
