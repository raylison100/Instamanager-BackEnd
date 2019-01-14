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
            'password'      => 'sometimes|required|max:30',
            'contaInsta_id' => 'nullable|unique:insta_contas,id',
        ],
    ];

    public function with(array $data)
    {
        if(!empty($data['id'])){
            $this->rules[ValidatorInterface::RULE_UPDATE]['email'] = "email|max:60|unique:users,email,".$data['id'];
        }
        $this->data = $data;
        return $this;
    }
}
