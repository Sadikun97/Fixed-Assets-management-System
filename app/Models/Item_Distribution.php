<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_Distribution extends Model
{
    protected $guarded=[];

    protected $table = 'item_distributions';

     public function itemRelation()
    {
    	return $this->belongsTo(Item::class,'item_id','id');
    }

     public function employeeRelation()
    {
    	return $this->belongsTo(employee::class,'employee_id','id');
    }
}
