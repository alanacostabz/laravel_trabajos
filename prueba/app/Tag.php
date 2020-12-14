<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function messages()
    {
        return $this->morphedByMany(Message::class, 'tagabble');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'tagabble');
    }
}
