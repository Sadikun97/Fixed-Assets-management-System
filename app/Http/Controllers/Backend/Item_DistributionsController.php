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

    //create itemd
public function createitemd(Request $request){

         //ORM



    $checkStock =Stock::where('items_id', $request->item_id)->count();

    if($checkStock != 0){
         Item_Distribution::create([
            'item_id'=>$request->input('item_id'),
            'employee_id'=>$request->input('employee_id'),
            'location'=>$request->input('location'),
            'remark'=>'helo'
        ]);
          return redirect()->back()->with('message','Item distributed Successfully');

    }else{

         return redirect()->back()->with('message','Item is stock out');
    }


       

       

    }


    //view itemdview

    public function itemtdview()
    {
          
          $itemdistributions=Item_Distribution::with('employeeRelation','itemRelation')->get(); 
          



        return view('Backend.itemdview', compact('itemdistributions'));

    }
}
