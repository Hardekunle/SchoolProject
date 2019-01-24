<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    public function setTypeAttribute($type){
        $this->attributes['type'] = strtoupper($type);
    }
}
