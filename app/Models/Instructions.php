<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $fillable = [
        'home', 'guideline', 'publication_fee', 'payment_method',
        'publication_ethics', 'contact', 'advisors', 'chief_editor',
        'executive_editor', 'asso_exe_editor', 'editors'
    ];
}
