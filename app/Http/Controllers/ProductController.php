<?php

namespace App\Http\Controllers;

use App\Models\AlgeriaCitie;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_product,Request $request)
    {
        $product = Product::findorFail($id_product);
        $name = $request->name;
        $cart = $request->cart;
        //dd($product->Productsize);
        return view('product', compact('product',"name","cart"));
    }

    public function getwilaya(){
        return AlgeriaCitie::select('wilaya_name_ascii','wilaya_name','wilaya_code')->groupBy('wilaya_code')->get();
    }

    public function getCommune($wilaya_code){

        return AlgeriaCitie::select('id','commune_name_ascii','commune_name', 'prix')->where('wilaya_code', $wilaya_code)->get();

    }

    public function saveOrder(Request $request){
       // dd($request);

        $order = new Order;
        $order->full_name = $request->full_name;
        $order->phone = $request->phone;
        $order->adresse = $request->adresse;
        $order->commune_id = $request->commune_id;
        $order->total = $request->total;
        $order->save();

//        $order->product_id = $request->product_id;

        $products = array();
        foreach ($request->products as $product) {
            //dd($product);
            $op= new OrderProduct();
            $op->product_id=$product['product_id'];
            $op->quantity=$product['quantity'];
            $op->color_id=$product['color_id'];
            $op->size_id=$product['size_id'];
            $products[] = $op;
        }

        $order->OrderProducts()->saveMany($products);

        Cart::destroy();

        /*
        $order = order::create([
            'product_id' => ,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'commune_id' => $request->commune_id,
            'adresse' => $request->adresse,
        ]);

        return view('order-confirmed', ['name' => $request->full_name]);
        */
    }
    public function addToCart(Request $request){
        //dd($request);
        //dd(Cart::content());
        //Cart::add($request->product_id, $request->name, $request->qnt,$request->price, 'size' => $request->qnt);
        Cart::add(['id' => $request->product_id, 'name' => $request->name, 'qty' => $request->quantity, 'price' => $request->price,'weight'=> 0, 'options' => ['color' => $request->colorId,'size' => $request->sizeId,'picture_url'=>$request->picture_url]]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
