<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;


class PurchasesController extends Controller
{
    
    public function makepurchase(){


        $items = Item::all();
    
    	return view('backend.purchases', compact('items'));
    } 

    public function createpurchases(Request $request)
    {
    

        $item = Item::findOrFail($request->items_id);
    $cartData=session('cart');
        if(!$cartData)
        {
            $cart  = [
            $request->items_id=>[
           'item_id'=>$request->items_id,
           'quantity'=>$request->quantity,
           'price'=>$request->price,
           'total'=>($request->quantity * $request->price),
           'name'=>$item->name
           ]
        ];

        session()->put('cart',$cart);

        return redirect()->back();
        }

        $cartData[$request->items_id]=[
           'item_id'=>$request->items_id,
           'quantity'=>$request->quantity,
           'price'=>$request->price,
           'total'=>($request->quantity * $request->price),
           'name'=>$item->name
        ];


            session()->put('cart',$cartData);
            
        return redirect()->back();

    }

    public function clearcart(){

        session()->forget('cart');
        return redirect()->back();

   }


   public function createitypes(Request $request){


    //ORM
   Item_Types::create([
       'name'=>$request->input('name'),
       'description'=>$request->input('description'),
   ]);

   return redirect()->back()->with('message','Item types Created Successfully');

}

public function addpurchase(Request $request){


    
   Purchase::create([
       'date'=>$request->input('date'),
       'purchase_by'=>$request->input('purchase_by'),
   ]);

   return redirect()->back()->with('message','Purchases added Successfully');

}

public function addpurchasedetails(Request $request){


  

   return redirect()->back()->with('message','Purchases Details added Successfully.');

}




public function submit(Request $request){

    $carts = session('cart');


    $purchase=Purchase::create([
        'purchase_by'=>auth()->user()->id,
         'quantity'=>$request->quantity,
        'total'=>array_sum(array_column($carts,'subt_total')),
     
    ]);


    foreach($carts as $data)
    {
       
        PurchaseDetails::create([
            'purchase_id'=>$purchase->id,
            'item_id'=>$data['item_id'],
             'quantity'=>$data['quantity'],
            'subt_total'=>$data['sub_total'],
            'price'=>$data['price'],
            'name'=>$data['name'],
        ]);

        return redirect()->back()->with('message','Purchases added Successfully.');
    }
    

}


   
}
