<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item_Types;
use DB;
class Item_TypesController extends Controller
{

	//make itypes
    public function makeitypes(){

    	return view('backend.itypes');


}


//create item types
    public function createitypes(Request $request){


         //ORM
        Item_Types::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);

        return redirect()->back()->with('message','Item types Created Successfully');

    }


    //view all item types
    public function itemtypesview()
    {
            
        $item_types= Item_Types::all();
        return view('Backend.itypesview', compact('item_types'));

    }


    //delete item types

     public function deleteitemtypes($id)
    {
       $item_types=Item_Types::find($id);

       if(!empty($item_types))
       {
           $item_types->delete();
           $message="Item Types Deleted Successfully";
       }else{
           $message="No data found.";
       }
        return redirect()->back()->with('message',$message);
    }

//edit item types
    public function edititemtypes($id){

         $item_types=Item_Types::find($id);
        return view('backend.edit_item_types',compact('item_types'));


    }

    //update item types controller

    public function updateitemtypes(Request $request,$id){


       $item_types=Item_Types::find($id);
       $item_types->update([
           'name'=>$request->input('name'),
           'description'=>$request->input('description'),
       ]);

       return redirect()->back()->with('message','Item Types Updated Successfully.');

   
    }

}
