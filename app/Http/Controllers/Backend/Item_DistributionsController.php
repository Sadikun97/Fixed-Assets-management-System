<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Item_DistributionsController extends Controller
{
    //make item distributions
    public function makeitemd()
    {
    	return view('backend.item-d');
    	
    }

    

}
