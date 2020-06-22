<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ProductName' , 'Type' , 'CategoryID' ,'Quantity' , 'Unit'];
}
