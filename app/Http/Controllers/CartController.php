<?php

namespace App\Http\Controllers;

// use App\Cart;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\ProductImage;
use Auth;
use Cart;
use Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $cart = session()->has('cart') ? session()->get('cart') : [];
        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'title' => $product->title,
                'quantity' => 1,
                'unit_price' => $product->sale_price,
            ];
        }
        session(['cart' => $cart]);
        session()->flash('message', $product->title.' added to cart.');

        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($data);
    }
    public function cart_page(){
        return view('frontend.pages.cart-page');
    }
    public function add(Request $request){
        $total_condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Express Shipping $15',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => '5%',
            'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
        ));
        $product = Product::find($request->product_id);
        // $user = Auth::user();
        // $userId = $user->id;
        $image = ProductImage::where('product_id', $request->product_id)->first();
        // Cart::add($product->id, $image->image, $product->title, $product->price, 1, array());
        //Check if item exits ?how to check if items have already card data?
        
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array( 
                'size' => 'L',
                'color' => 'blue',
                'image' => $image->image),
            'conditions' => $total_condition
        ));
        Cart::condition($total_condition);
        return back()->with('success',"$product->title has successfully beed added to the shopping cart!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required'
        ],
        [
            'product_id.required' => 'Please choose your product'
        ]);
        $cart = new Cart();
        if ( Auth::check() ){
            $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        }
        else{
            $cart = Cart::where('ip_address', request()->ip() )->where('product_id', $request->product_id)->first();
        }
        if ( !is_null($cart) ){
            $cart->increment('product_quantity');
        }
        else{
            $cart = new Cart();

            if ( Auth::check() ){
                $cart->user_id = Auth::id(); 
            }
            $cart->ip_address = $request->ip();
            $cart->product_id = $request->product_id;
            // $cart->order_id = $request->order_id;
            // $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }  

        
        
        session()->flash('success', 'Product Add to Cart');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Item has been added to carts');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Item has been deleted from carts');
        return back();
    }
    public function clear(){
        Cart::clear();
        return Response::json(['message'=>'Data removed']);  
    }
}
