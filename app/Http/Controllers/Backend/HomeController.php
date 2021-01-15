<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Damage;

class HomeController extends Controller
{
   
    public function dashboard()
    {

        $item=Item::count();
        $carts=Purchase::count();
        $stocks=Stock::count();
        $damages=Damage::count();
        return view('Backend.home',compact('item','carts','stocks','damages'));
    }
    
}
