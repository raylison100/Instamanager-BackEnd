<?php
    /**
     * Created by PhpStorm.
     * User: raylison
     * Date: 09/01/19
     * Time: 10:30
     */

namespace App\Services;


 use App\Repositories\InstaContaRepository;
 use App\Services\Traits\CrudMethods;

 class InstaContaService
 {
    use CrudMethods;

    protected $repository;

    public function __construct(InstaContaRepository $repository)
    {
        $this->repository = $repository;
    }
 }
