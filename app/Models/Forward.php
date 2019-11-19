<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forward extends Model
{
    protected $fillable = [
        'from_date', 'to_date', 'status', 'opinion_format', 'manuscript', 'comments'
    ];

    public function paper()
    {
        return $this->belongsTo('App\Models\Paper');
    }

    public function reviewer()
    {
        return $this->belongsTo('App\User');
    }
}
