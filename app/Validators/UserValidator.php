<?php

namespace App\Validators;

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
            'email'         => 'required|unique|email',
            'password'      => 'required|max:30',
            'contaInsta_id' => 'nullable|unique'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'          => 'nullable',
            'email'         => 'nullable|unique|email',
            'password'      => 'nullable',
            'contaInsta_id' => 'nullable|unique',
            'created_at'    => 'required|date_format:Y-m-d H:i:s',
            'updated_at'    => 'required|date_format:Y-m-d H:i:s',
            'deleted_at'    => 'nullable|date_format:Y-m-d H:i:s',
        ],
    ];
}
