<?php

namespace App\Validators;

use Illuminate\Http\Request;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'          => 'required|max:30',
            'email'         => 'required|unique:users,email|email',
            'password'      => 'required|max:30',
            'contaInsta_id' => 'nullable|unique:insta_contas,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'          => 'sometimes|required|max:30',
            'email'         => 'unique:users,email|email',
            'password'      => 'sometimes|required|max:30',
            'contaInsta_id' => 'nullable|unique:insta_contas,id',
        ],
    ];
}
