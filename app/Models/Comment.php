<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comment";
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }
}
