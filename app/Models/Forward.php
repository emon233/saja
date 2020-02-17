<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Forward extends Model
{
    protected $fillable = [
        'from_date', 'to_date', 'status', 'opinion_format', 'manuscript', 'comments'
    ];

    /**
     * Relationship with Paper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paper()
    {
        return $this->belongsTo('App\Models\Paper');
    }

    /**
     * Relationship with Reviewer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo('App\User');
    }
}
