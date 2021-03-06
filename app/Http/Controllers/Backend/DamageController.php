<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Damage;
use App\Models\Item;
use App\Models\Item_Distribution;

class DamageController extends Controller
{
    

     //make damage
     public function makedamage($id)
    {
      $disId=$id;
    
      return view('backend.damage',compact('disId'));
    }

//add items in damage

     public function createdamage(Request $request){

     $distibution = Item_Distribution::findOrFail($request->disId);

        Damage::create([
            'item_distribution_id'=>$request->disId,
            'reason'=>$request->reason,
            'is_responsible'=>$request->is_responsible,
            'item_id' =>$distibution->item_id
        ]);
        return redirect()->back()->with('message','Item added in damage list successfully.');

    }

    //view damage list

     public function damageview()
    {


        $damages=Damage::with('itemRelation')->get();

         return view('Backend.damageview',compact('damages'));
   

    }


      
}
