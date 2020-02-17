<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * Mass Assignable Property
     *
     * @var array
     */
    protected $fillable = [
        'year', 'volume', 'issue_no', 'current'
    ];

    /**
     * Has Many Archives
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function archives()
    {
        return $this->hasMany('App\Models\Archive');
    }
}
