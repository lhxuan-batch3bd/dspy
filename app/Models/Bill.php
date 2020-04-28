<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bill extends Model
{
    use SoftDeletes;
    //
    protected $table = "bills";
    protected $primaryKey = 'id';

    public function bill_detail()
    {
        return $this->hasMany('App\Models\BillDetail', 'id_bill', 'id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'id_customer');
    }
}
