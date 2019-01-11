<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class InstaContaValidator.
 *
 * @package namespace App\Validators;
 */
class InstaContaValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'      => 'required|unique:insta_contas,name|max:30',
            'password'  => 'required|max:30'
        ],
        ValidatorInterface::RULE_UPDATE => [

            'name'          => 'nullable|unique:insta_contas,name',
            'password'      => 'nullable',
            'created_at'    => 'required|date_format:Y-m-d H:i:s',
            'updated_at'    => 'required|date_format:Y-m-d H:i:s',
            'deleted_at'    => 'nullable|date_format:Y-m-d H:i:s',
        ],
    ];
}
