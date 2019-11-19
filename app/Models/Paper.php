<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'title', 'running_title', 'keywords', 'manuscript',
        'cover_letter', 'title_page', 
        'check_list', 'processing_fee',
        'declaration_letter', 'correction', 
        'publication_fee', 'edited_manuscript',
        'galley_proof', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discipline()
    {
        return $this->belongsTo('App\Models\Discipline');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function forwards()
    {
        return $this->hasMany('App\Models\Forward');
    }

    public static function generateManuscriptNo($manuscript)
    {
        $guessExtension = $manuscript->guessExtension();
        $year = self::currentYear();
        $paper = Paper::whereYear('created_at', $year)->count() + 1;

        return $year . '_SAJA_' . $paper. '.' . $guessExtension;
    }

    protected static function currentYear()
    {
        return  Carbon::now()->year;
    }
}
