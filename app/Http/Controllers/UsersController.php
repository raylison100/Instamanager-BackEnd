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
     * @var UserService
     */
    protected $service;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserService $service
     * @param UserValidator $validator
     */
    public function __construct(UserService $service, UserValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
