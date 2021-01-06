<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;


class PurchasesController extends Controller
{
    public function makepurchases(){


        $purchases = Item::all();
    	return view('backend.purchases', compact('purchases'));
    }

    public function createpurchases(Request $request)
    {
       
    $cartData=session('cart');
        if(!$cartData)
        {
            $cart  = [
            $request->items_id=>[
           'item_id'=>$request->items_id,
           'quantity'=>$request->quantity,
           'price'=>$request->price]
        ];

        session()->put('cart',$cart);

        return redirect()->back();
        }

        $cartData[$request->items_id]=[
           'item_id'=>$request->items_id,
           'quantity'=>$request->quantity,
           'price'=>$request->price
        ];


            session()->put('cart',$cartData);
            
        return redirect()->back();

    }

}
