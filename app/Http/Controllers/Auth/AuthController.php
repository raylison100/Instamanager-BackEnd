<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
class AuthController extends Controller
{
    protected $service;
    public function __construct(AuthService $service)
    {
        $this->service  = $service;
    }
    public function getUserAuthenticated()
    {
        return $this->service->getUserByToken();
    }
    public function enableSignUp($token)
    {
        return $this->service->enableSignUp($token);
    }
    public function destroyToken(){
        return $this->service->destroyToken();
    }
}
