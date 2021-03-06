<?php

namespace App\Services\Traits;

use App\Services\Service;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CrudMethods
 * @package app\Services\Traits
 */
trait CrudMethods
{
    /** @var  RepositoryInterface $repository */
    protected $repository;

    /**
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 20)
    {
        return $this->repository->paginate($limit);
    }

    /**
     * @param array $data
     * @param bool $skipPresenter
     * @return mixed
     */
    public function create(array $data, $skipPresenter = false)
    {
        return $skipPresenter ? $this->repository->skipPresenter()->create($data) : $this->repository->create($data);
    }

    /**
     * @param $id
     * @param bool $skip_presenter
     * @return mixed
     */
    public function find($id, $skip_presenter = false)
    {
        if ($skip_presenter){
            return $this->repository->skipPresenter()->find($id);
        }
        return $this->repository->find($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param array $data
     * @param bool $first
     * @param bool $presenter
     * @return mixed
     */
    public function findWhere(array $data, $first = false, $presenter = false)
    {
        if ($first) {
            return $this->repository->skipPresenter()->findWhere($data)->first();
        }
        if ($presenter) {
            return $this->repository->findWhere($data)->first();
        }
        return $this->repository->skipPresenter()->findWhere($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        $this->repository->delete($id);
        return ['error' => false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function restore($id)
    {
        $this->repository->restore($id);
        return ['error' => false];
    }

    public function sendResponse($data, $message)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendErro($message,$code)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }
}
