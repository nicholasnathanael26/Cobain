<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
