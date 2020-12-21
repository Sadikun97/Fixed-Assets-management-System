<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Damage;
use App\Models\Item;

class DamageController extends Controller
{
    //damage form show
    
    public function makedamage(){

        $itemshow = Item::all();
         return view('backend.damage',compact('itemshow'));
     }
 
     //add item in damage
     public function createdamage(Request $request){

        //ORM
       Item::create([
           'name'=>$request->name,
            'item_types_id'=>$request->item_types_id,
           'code'=>$request->code,
           'description'=>$request->description
       ]);

       return redirect()->back()->with('message','Item Created Successfully.');

   }

}
