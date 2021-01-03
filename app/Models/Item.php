<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded=[];

    public function itemTypesRelation()
    {
    	return $this->belongsTo(Item_Types::class,'item_types_id','id');
    }
}
