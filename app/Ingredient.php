<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
}
