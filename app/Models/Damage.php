<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    protected $guarded=[];
    protected $table = 'damages';

    
    public function itemRelation()
    {
    	return $this->belongsTo(Item::class,'item_id','id');
    }

}
