<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable=['name','protein','carbohydrate','fat'];

    public function meal()
    {
    	return $this->belongsTo(Meal::class);
    }

    public function calories(){
    	return($this->protein*4)+($this->carbohydrate*4)+($this->fat*9);
    }
}
