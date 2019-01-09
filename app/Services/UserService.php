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
}
