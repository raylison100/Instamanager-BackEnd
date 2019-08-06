<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\InstaContaRepository;
use App\Entities\InstagramAccount;
use App\Validators\InstaContaValidator;

/**
 * Class InstaContaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class InstaContaRepositoryEloquent extends BaseRepository implements InstaContaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return InstagramAccount::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return InstaContaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
