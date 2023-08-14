<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {

        //sales this week - orders total within date range on a chart
        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfLastWeek  = Carbon::now()->subWeek()->endOfWeek();

        $startWeek = Carbon::now()->startOfWeek();
        $endWeek   = Carbon::now()->endOfWeek();

        //find total made from sales this week
        $salesThisWeek = Order::whereBetween(
            'created_at',
            [$startWeek, $endWeek]
        )->sum('total_price');
        //find total made from sales this week
        $salesLastWeek = Order::whereBetween(
            'created_at',
            [$startOfLastWeek, $endOfLastWeek]
        )->sum('total_price');
        //find percentage between thisweek and last week

        if ($salesLastWeek && $salesLastWeek > 0) {
            $percentage = ($salesThisWeek - $salesLastWeek) / $salesThisWeek * 100;
            $percentage = round($percentage);
        } else {
            $percentage = 100;
        }

        //latest transactions - a list of the last 10 orders
        $lastTenOrders = Order::latest()->take(15)->get();

        //number of products
        $productAmount = Product::count();

        //number of customers
        $userAmount = User::count();

        //new customers this week
        $customersThisWeek = User::whereBetween(
            'created_at',
            [$startWeek, $endWeek]
        )->count();

        //total from last week
        $customersThisWeek = User::whereBetween(
            'created_at',
            [$startWeek, $endWeek]
        )->count();

        //customer weekly growth
        $customerTotal = User::count();
        if ($customersThisWeek > 0) {
            $customerGrowth = $customersThisWeek * 100 / $customerTotal;
            $customerGrowth = round($customerGrowth);
        } else {
            $customerGrowth = 0;
        }

        //latest users
        $latestUsers = User::latest()->take(10)->get();

        //dd($customerGrowth);

        return view('admin.dashboard', [
            'salesThisWeek' => $salesThisWeek,
            'salesLastWeek' => $salesLastWeek,
            'weeklyDifference' => $percentage,
            'lastTenOrders' => $lastTenOrders,
            'productAmount' => $productAmount,
            'userAmount' => $userAmount,
            'customersThisWeek' => $customersThisWeek,
            'customerGrowth' => $customerGrowth,
            'latestUsers' => $latestUsers
        ]);
    }
}