<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded=[];

     protected $table ='stocks';

     public function itemRelation()
    {
    	return $this->belongsTo(Item::class,'items_id','id');
    }
}
