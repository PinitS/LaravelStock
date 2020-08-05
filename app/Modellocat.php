<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modellocat extends Model
{
    protected $fillable = ['modellocatname' , 'updated_at' , 'created_at'];

    public function broadlocat()
    {
        return $this->hasMany(Broadlocat::class);
    }
    //
}
