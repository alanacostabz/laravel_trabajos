<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_articulo',
        'precio',
        'pais_origen',
        'observaciones',
        'seccion'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function ratings()
    {
        return $this->morphMany("App\Rating", "rating");
    }
}
