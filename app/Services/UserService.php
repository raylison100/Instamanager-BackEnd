<?php
/**
 * Created by PhpStorm.
 * User: raylison
 * Date: 09/01/19
 * Time: 10:56
 */
namespace App\Services;

use App\Entities\User;
use App\Notifications\SingUpActivate;
use App\Repositories\UserRepository;
use App\Services\Traits\CrudMethods;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserService
{
    use CrudMethods;
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function create(array $data, $skipPresenter = true)
    {
        try{
            $data['password']           = bcrypt($data['password']);
            $data['activation_token']   = Str::random(60);
            $data['scope']              = User::COMMON;
            DB::beginTransaction();
            $user =  $skipPresenter ? $this->repository->skipPresenter()->create($data) : $this->repository->create($data);
            $user->notify(new SingUpActivate($user));
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => "Please check you email"
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => "Fail create user"
            ]);
        }
    }
    public function update(array $data, $id)
    {
        try{
            if(!empty($data['password'])){
                $data['password'] =  bcrypt($data['password']);
            }
            DB::beginTransaction();
            $data =  $this->repository->update($data, $id);
            DB::commit();
            return $data;
        }catch (\Exception $e){
            DB::rollBack();
            return [
                'error' => true,
                'message' => "Failed to update user"
            ];
        }
    }
}
