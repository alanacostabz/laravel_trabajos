<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{


    protected $fillable = ["nombre", "apellidos"];

    public function article()
    {
        return $this->hasOne("App\Article");
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function profiles()
    {
        return $this->belongsToMany("App\Profile");
    }


    public function ratings()
    {
        return $this->morphMany("App\Rating", "rating");
    }
}
