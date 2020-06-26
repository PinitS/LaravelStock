<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productName' , 'type' , 'category_id' ,'quantity' , 'unit'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
