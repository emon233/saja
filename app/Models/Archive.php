<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    /**
     * Mass Assignable Properties
     *
     * @var array
     */
    protected $fillable = [
        'title', 'authors', 'pages', 'file'
    ];

    /**
     * Undocumented function
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issue()
    {
        return $this->belongsTo('App\Models\Issue');
    }
}
