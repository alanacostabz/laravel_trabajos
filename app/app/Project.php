<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // protectd $table = 'my_table'

    //protected $fillable = ['title', 'url', 'content'];

    #solo se usa cuando no usamos request->all()
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }
}
