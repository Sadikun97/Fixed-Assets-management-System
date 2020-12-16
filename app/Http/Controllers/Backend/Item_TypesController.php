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


}
