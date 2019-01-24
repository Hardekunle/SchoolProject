<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function register(){
        $clas=$this->class;
        $newclas=substr($clas,-2);
        $registra=$newclas."".$this->id."".$this->year;
        return($registra);
    }
}
