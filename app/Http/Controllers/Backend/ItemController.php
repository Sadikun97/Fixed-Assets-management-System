<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use DB;
use App\Models\item_types;


class ItemController extends Controller
{
    //make item
    public function makeitem(){

       $itemtypeshow = item_types::all();
    	return view('backend.item',compact('itemtypeshow'));
    }

    //edit item

    public function edititem($id){

         $items=Item::find($id);
        // $categories=Category::all();
        return view('backend.edit_item',compact('items'));


    }


    //update item

 public function updateitem(Request $request,$id){


       $items=Item::find($id);
       $items->update([
           'name'=>$request->input('name'),
           'item_types_id'=>$request->input('item_types_id'),
           'code'=>$request->input('code'),
           'description'=>$request->input('description'),
       ]);

       return redirect()->back()->with('message','Item Updated Successfully.');

   
    }


//create item
    public function createItem(Request $request){

         //ORM
        Item::create([
            'name'=>$request->name,
             'item_types_id'=>$request->item_types_id,
            'code'=>$request->code,
            'description'=>$request->description
        ]);

        return redirect()->back()->with('message','Item Created Successfully.');

    }
//view all items
    public function fview()
    {
            
        $item=Item::with('itemTypesRelation')->paginate(5);
        return view('Backend.fview', compact('item'));

    }


    //delete item

 public function delete($id)
    {
       $item=Item::find($id);

       if(!empty($item))
       {
           $item->delete();
           $message="Item Deleted Successfully";
       }else{
           $message="No data found.";
       }
        return redirect()->back()->with('message',$message);
    }


    public function itemActive($id)
    {
         $itemStatus = Item::find($id);

         if($itemStatus->status)
         {
             $itemStatus->update([

                 'status' => 0
             ]);
         }else{
             $itemStatus->update([

                 'status' => 1
             ]);
         }

         return redirect()->back()->with('message','Item Status Updated!');
    }

    




}
