<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'name', 'status'
    ];

    public function papers()
    {
        return $this->hasMany('App\Models\Paper');
    }
}
