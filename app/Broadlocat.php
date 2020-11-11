<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadlocat extends Model
{
    protected $fillable = ['modellocat_id' , 'serialbroad' , 'customername' , 'province_id' , 'address' , 'setupdate' , 'map'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function modellocat()
    {
        return $this->belongsTo(Modellocat::class);
    }

}
