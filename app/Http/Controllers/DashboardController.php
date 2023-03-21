<?php


namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{

    public function index() {
        $orders = Order::with('Commune')
                       ->with('OrderProducts.Product')
                       ->with('OrderProducts.ProductColor')
                       ->with('OrderProducts.ProductSize')->paginate(2);
        //dd($orders);
        return view('dashboard',compact('orders'));
/*
        $orders = order::join('products', 'orders.product_id','products.id')
            ->join('algeria_cities', 'orders.commune_id', 'algeria_cities.id')
            ->select('orders.*', 'products.name',DB::raw("(`algeria_cities`.`prix` + `products`.`prix`) as prix") ,'products.img as img', 'algeria_cities.wilaya_code as wilaya')
            ->get();
        */
    }

    public function accept_order(Request $request){
        $orders = order::where('id', $request->id)
                         ->update(['status' => 1]);

        return back()->withInput();
    }

    public function refuse_order(Request $request){
        $orders = order::where('id', $request->id)
            ->update(['status' => 0]);

        return back()->withInput();
    }

    public function annulled_order(Request $request){
        $orders = order::where('id', $request->id)
            ->update(['status' => 2]);

        return back()->withInput();
    }




}
/*
 * $response = Http::get("https://ext.riskblacklist.com/trial/tel.php?f="."0668407723");
        dd(explode(":",$response->body()));
        $orders = DB::table('orders')
            ->join('products', function ($join) {
                $join->on('orders.product_id', 'products.id')
                    ->where('products.id', '=', 5);
            })
            ->get();*/
