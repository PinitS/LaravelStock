<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function broadlocat()
    {
        return $this->hasMany(Broadlocat::class);
    }
}
