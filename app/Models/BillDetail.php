<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table = "bills_detail";
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill', 'id_bill', 'id');
    }
}
