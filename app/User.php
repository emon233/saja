<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name',
        'affiliation', 'specialization',
        'phone', 'mobile',
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Relation with Reviewer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reviewer()
    {
        return $this->hasOne('App\Models\Reviewer');
    }

    /**
     * Relation with Editor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function editor()
    {
        return $this->hasOne('App\Models\Editor');
    }

    /**
     * Generate the Full Name of an User
     *
     * @param User $user
     * @return string|null
     */
    public static function generateFullNameFromUser(User $user)
    {
        return $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
    }
}
