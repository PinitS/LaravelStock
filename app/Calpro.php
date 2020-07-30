<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calpro extends Model
{
    //
    protected $fillable = ['modelcal_id' , 'product_id' , 'calquantity' , 'sumquantity' , 'updated_at' , 'created_at'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
