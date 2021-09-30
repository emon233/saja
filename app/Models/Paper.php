<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    /**
     * Mass Assignable Fields
     *
     * @var array
     */
    protected $fillable = [
        'title', 'running_title', 'keywords', 'manuscript',
        'cover_letter', 'title_page',
        'check_list', 'processing_fee',
        'declaration_letter', 'correction',
        'payment_slip', 'edited_manuscript',
        'galley_proof', 'status', 'final_galley_proof'
    ];

    /**
     * Primary Key for Papers Table
     *
     * @var bigInteger
     */
    protected $primayKey = 'id';

    /**
     * BelongsTo User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * BelongsTo Discipline
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discipline()
    {
        return $this->belongsTo('App\Models\Discipline');
    }

    /**
     * BelongsTo Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * HasMany Forwards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forwards()
    {
        return $this->hasMany('App\Models\Forward');
    }
}
