<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item_Distribution;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Employee;
class Item_DistributionsController extends Controller
{
    //make item distributions
    public function makeitemd()
    {
    	

    	$itemdshow = Item::where('status','=', 1)->get();
    	$itemdshoww = Employee::all();

    	return view('backend.item-d',compact('itemdshow', 'itemdshoww'));

    	
    }

    //create itemdistribution
public function createitemd(Request $request){

    $checkStock =Stock::where('items_id', $request->item_id)->first();

    

    if($checkStock->quantity >= $request->input('quantity')){
         Item_Distribution::create([
            'item_id'=>$request->input('item_id'),
            'employee_id'=>$request->input('employee_id'),
            'location'=>$request->input('location'),
            'quantity'=>$request->input('quantity'),
            'remark'=>'helo'
        ]);

            $checkStock->decrement('quantity',$request->input('quantity'));

          return redirect()->back()->with('message','Item distributed Successfully');

    }else{

         return redirect()->back()->with('message','Item is stock out');
    }


       

       

    }


    //view itemdistribution

    public function itemtdview()
    {
          
          $itemdistributions=Item_Distribution::with('employeeRelation','itemRelation')->get(); 
          



        return view('Backend.itemdview', compact('itemdistributions'));

    }


     //delete item distribution

 public function deleteitemd($id)
 {
    $itemdistributions=Item_Distribution::find($id);

    if(!empty($itemdistributions))
    {
        $itemdistributions->delete();
        $message="Item Distribution Deleted Successfully";
    }else{
        $message="No data found.";
    }
     return redirect()->back()->with('message',$message);
 }

}
