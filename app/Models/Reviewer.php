<?php

namespace App\Models;

use Auth;
use Session;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = [
        'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function isReviewer()
    {
        if (empty(Session::get('isReviewer'))) {
            $user = Reviewer::where([['user_id', '=', Auth::id()], ['status', '=', 1]])->first();
            if (empty($user)) {
                return false;
            } else {
                Session::put('isReviewer', true);
                return true;
            }
        } else {
            return false;
        }
    }
}
