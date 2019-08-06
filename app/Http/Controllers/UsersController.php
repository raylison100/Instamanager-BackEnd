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
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    use CrudMethods;
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

}
