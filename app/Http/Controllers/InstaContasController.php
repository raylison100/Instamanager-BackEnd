<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\InstaContaService;
use App\Validators\InstaContaValidator;

/**
 * Class InstaContasController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstaContasController extends Controller
{
    use CrudMethods;

    /**
     * @var InstaContaService
     */
    protected $service;

    /**
     * @var InstaContaValidator
     */
    protected $validator;

    /**
     * InstaContasController constructor.
     *
     * @param InstaContaService $service
     * @param InstaContaValidator $validator
     */
    public function __construct(InstaContaService $service, InstaContaValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

    public function logarInsta(){

    }
}
