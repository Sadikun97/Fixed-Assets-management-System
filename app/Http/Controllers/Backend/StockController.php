<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Item;

class StockController extends Controller
{
    //make stock
    public function makestock(){

      $itemdshow = Item::all();
    	return view('Backend.stock',compact('itemdshow'));
    }


    //create stock

    public function addstock(Request $request){

         //ORM
        Stock::create([
            
             'items_id'=>$request->items_id,
            'quantity'=>$request->quantity,
           
        ]);

        return redirect()->back()->with('message','Item Added in Stock Successfully.');

    }
    //view stocks
    public function stockview()
    {
            
        $stocks = Stock::all();
        return view('Backend.stockview',compact('stocks'));

    }
}
