<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class InstaConta.
 *
 * @package namespace App\Entities;
 */
class InstaConta extends Model implements Transformable
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
        'apiKey',
        'apiSecret',
        'apiCallback',
        'curtidasQTD',
        'seguidoresQTD',
        'comentariosQTD'
    ];

    protected $hidden = [
        'password'
    ];




    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
