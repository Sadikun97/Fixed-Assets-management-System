<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded=[];

    public function details()
    {
        return $this->hasMany(PurchaseDetails::class);
    }
}
