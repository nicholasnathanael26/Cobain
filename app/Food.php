<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
	public function photo()
    {
        return $this->hasMany(Photo::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
