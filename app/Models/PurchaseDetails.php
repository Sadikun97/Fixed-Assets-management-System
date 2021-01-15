<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    
    protected $guarded=[];
    protected $table='purchases_details';

    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }
}
