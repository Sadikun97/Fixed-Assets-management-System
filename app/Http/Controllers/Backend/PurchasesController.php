<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchasesController extends Controller
{
    public function makepurchases(){

    	return view('backend.purchases');
    }

    public function createpurchases(Request $request){

         //ORM
        Purchase::create([
            'created_by'=>$request->created_by,
            'total_amount'=>$request->total_amount,
            'remark'=>$request->remark,
        ]);

        return redirect()->back();

    }

}
