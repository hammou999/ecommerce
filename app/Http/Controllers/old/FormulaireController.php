<?php

namespace App\Http\Controllers;


use App\Models\order;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FormulaireController extends Controller
{
    public function getwilaya(){

        return DB::table('algeria_cities')->select('wilaya_name_ascii','wilaya_name','wilaya_code')->groupBy('wilaya_code')->get();

    }

    public function getCommune($wilaya_code){

        return DB::table('algeria_cities')->select('id','commune_name_ascii','commune_name', 'prix')->where('wilaya_code', $wilaya_code)->get();

    }

    public function saveOrder(Request $request){

        $order = order::create([
            'product_id' => $request->product_id,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'commune_id' => $request->commune_id,
            'adresse' => $request->adresse,
            'remarque' => $request->remarque,
        ]);

        return view('order-confirmed', ['name' => $request->full_name]);
    }
    public function addToCart(Request $request){
        //dd($request);
        Cart::add($request->product_id,  $request->name,$request->qnt, $request->price);
    }


}
