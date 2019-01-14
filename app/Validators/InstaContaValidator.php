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
            'name'              => 'required|unique:insta_contas,name|max:30',
            'password'          => 'required|max:30',
            'apiKey'            => 'nullable|string',
            'apiSecret'         => 'nullable|string',
            'apiCallback'       => 'nullable|string',
            'curtidasQTD'       => 'nullable|integer',
            'seguidoresQTD'     => 'nullable|integer',
            'comentariosQTD'    => 'nullable|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'              => 'nullable|unique:insta_contas,name',
            'password'          => 'nullable',
            'apiKey'            => 'nullable|string',
            'apiSecret'         => 'nullable|string',
            'apiCallback'       => 'nullable|string',
            'curtidasQTD'       => 'nullable|integer',
            'seguidoresQTD'     => 'nullable|integer',
            'comentariosQTD'    => 'nullable|integer',
        ],
    ];
}
