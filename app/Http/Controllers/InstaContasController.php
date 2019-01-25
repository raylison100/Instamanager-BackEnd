<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\InstaContaService;
use App\Validators\InstaContaValidator;
use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use Curl\Curl;

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


    protected $instagram;

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
        $this->instagram = new Instagram(array(
            'apiKey' => '7d307f934f344ea6a98e72575a3cdd4d',
            'apiSecret' => 'b248b3c77f98458bae51074b291f1bdb',
            'apiCallback' => 'http://127.0.0.1:8000/api/callback/{code}'
        ));
    }

    public function loginInsta(){
            return redirect($this->instagram->getLoginUrl());
    }


    /**
     * @param \Illuminate\Http\Request $request
     */
    public function callback(Request $request){


        $code = $request->input('code');
        $data = $this->instagram->getOAuthToken($code);
        dd($data);

    }
}
