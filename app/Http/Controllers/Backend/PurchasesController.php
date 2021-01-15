<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\PurchaseDetails;


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
            $cart  = [$request->items_id=>[
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

// public function addpurchase(Request $request){


    
//    Purchase::create([
//        'date'=>$request->input('date'),
//        'purchase_by'=>$request->input('purchase_by'),
//    ]);

//    return redirect()->back()->with('message','Purchases added Successfully');

// }

// public function addpurchasedetails(Request $request){


  

//    return redirect()->back()->with('message','Purchases Details added Successfully.');

// }




public function submit(Request $request){
    // dd($request->all());    
    $carts = session('cart');


    $purchase=Purchase::create([
        'total'=>array_sum(array_column($carts,'total')),
        'remarks'=>$request->remarks,
        'purchase_by'=>auth()->user()->id,
         
    ]);


    foreach($carts as $data)
    {
     
        PurchaseDetails::create([
            'purchase_id'=>$purchase->id,
            'item_id'=>$data['item_id'],
            'quantity'=>$data['quantity'],
            'price'=>$data['price'],
            'total'=>$data['total'],

            
        ]);
//items add in stocks
        $stock=Stock::where('items_id',$data['item_id'])->first();
        if($stock)
        {
            $stock->increment('quantity',$data['quantity']);
        }else
        {
            Stock::create([
                'items_id'=>$data['item_id'],
                'quantity'=>$data['quantity']
            ]);
        }
       

        
    }

    session()->forget('cart');
    return redirect()->back()->with('message','Purchases added Successfully.');
    

}

//view purchase list

    public function purchaselistview()
    {
        $purchases=Purchase::all();   
        return view('Backend.purchaselist',compact('purchases'));

    }

    //delete purchase

 public function purchasedelete($id)
 {
    $purchases=Purchase::find($id);

    if(!empty($purchases))
    {
        $purchases->delete();
        $message="Purchase Deleted Successfully";
    }else{
        $message="No data found.";
    }
     return redirect()->back()->with('message',$message);
 }
   
 public function purchasedetailsview($id){
    $purchases=Purchase::with(['details','details.item'])->find($id);
   
    return view('Backend.purchasedetails',compact('purchases'));

 }
}
