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

       $itemsshow = item::all();
    	return view('backend.stock',compact('itemsshow'));
    }


    //create stock

    public function createstock(Request $request){

         //ORM
        Stock::create([
            
             'item_id'=>$request->item_id,
            'quantity'=>$request->quantity,
           
        ]);

        return redirect()->back()->with('message','Item Added in Stock Successfully.');

    }
    //view all items
    public function stockview()
    {
            
        
        return view('Backend.stockview');

    }
}
