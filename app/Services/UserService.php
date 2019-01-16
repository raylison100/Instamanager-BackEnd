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
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;


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
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    public function login($request)
    {
        $input = $request;
        $user = array_get($this->repository->skipPresenter()->findByField('email',$input['username']),'0');;

        if(Hash::check($input['password'], $user->password)) {
            $this->redirect("oauth/token");
        }

        return null;
    }

}
