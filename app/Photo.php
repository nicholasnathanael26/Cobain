<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
