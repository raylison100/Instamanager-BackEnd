<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Traits\TransformableTrait;




class User extends Authenticatable
{
    use HasApiTokens, Notifiable,TransformableTrait;

    const ADMIN  = 1;
    const COMMON = 2;
    const SUBSCRIBER = 3;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name',
        'email',
        'instagram_account_id',
        'scope',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_token'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function instagramAccount()
    {
        return $this->hasOne('App\Entities\InstagramAccount');
    }

}
