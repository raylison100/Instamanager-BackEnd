<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class InstagramAccount.
 *
 * @package namespace App\Entities;
 */
class InstagramAccount extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'likes',
        'followers',
        'comments',
        'apiKey',
        'apiSecret',
        'apiCallback',
    ];

    protected $hidden = [
        'password'
    ];




    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
