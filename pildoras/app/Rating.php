<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function rating()
    {
        return $this->morphTo();
    }
}
