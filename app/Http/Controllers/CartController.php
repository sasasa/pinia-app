<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return Cart::where('user_id', $request->user()->id)
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->get();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            collect($request->all())->each(function($cart) use($request) {
                $cartObj = Cart::where('user_id', $request->user()->id)->where('product_id', $cart['id'])->first();
                if($cartObj) {
                    $cartObj->quantity = $cart['quantity'];
                } else {
                    $cartObj = new Cart([
                        'user_id' => $request->user()->id,
                        'product_id' => $cart['id'],
                        'quantity' => $cart['quantity'],
                    ]);
                }
                $cartObj->save() ;
            });
            DB::commit();
            return Cart::where('user_id', $request->user()->id)
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->get();
        } catch (\Exception $e) {
            DB::rollback();
            return abort(500);
        }
    }
}
