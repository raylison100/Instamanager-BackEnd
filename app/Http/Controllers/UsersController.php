<?php
/**
 * Created by PhpStorm.
 * User: raylison
 * Date: 09/01/19
 * Time: 10:54
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\UserService;
use App\Validators\UserValidator;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    use CrudMethods;

    /**
     * @var \App\Services\UserService
     */
    protected $service;
    /**
     * @var \App\Validators\UserValidator
     */
    protected $validator;

    public function __construct(UserService $service, UserValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;

    }

    public function store(Request $request)
    {

        try{
            if($this->validator){
                $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            }
            return $this->service->create($request->all());
        }catch (ValidatorException $e)
        {
            return $e->getMessageBag();
        }
    }

    public function login($username, $password){

    }


    public function logout(){

    }
}
