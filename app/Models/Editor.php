<?php

namespace App\Models;

use Auth;
use Session;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    /**
     * Mass Assignable Attributes
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'status'
    ];

    /**
     * Relationship with App\User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Check if User is Editor
     *
     * @return boolean
     */
    public static function isEditor()
    {
        if (!Session::get('isEditor')) {
            $user = Editor::where([['user_id', '=', Auth::id()], ['status', '=', 1]])->first();
            if (empty($user)) {
                return false;
            } else {
                Session::put('isEditor', true);
                return true;
            }
        } else {
            return true;
        }
    }
}
