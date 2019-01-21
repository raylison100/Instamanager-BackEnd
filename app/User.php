<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Traits\TransformableTrait;




class User extends Authenticatable
{
    use HasApiTokens, Notifiable,TransformableTrait;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contaInsta_id',
        'scope'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function instaConta()
    {
        return $this->hasOne('App\Entities\InstaConta');
    }

}
