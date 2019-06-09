<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function fees(){
        return $this->hasMany('App/Fees');
    }

    function getstudentfee($id) {
        $student = Fees::with('amount')->findOrFail($id);

    }
}
