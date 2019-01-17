<?php
/**
 * Created by PhpStorm.
 * User: raylison
 * Date: 09/01/19
 * Time: 10:56
 */
namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Traits\CrudMethods;

class UserService
{
    use CrudMethods;

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request, $skipPresenter = false)
    {
        $input = $request;
        $input['password'] = bcrypt($input['password']);
        $skipPresenter ? $this->repository->skipPresenter()->create($input) : $this->repository->create($input);
        $user = $this->repository->skipPresenter()->findByField('email',$input['email']);
        $user = array_get($user,'0');
        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['name'] =  $user->name;

        return $this->sendResponse($data, 'User register successfully.');
    }

    public function Notlogin()
    {
        return $this->sendErro('Unautahorised',401);
    }
}
