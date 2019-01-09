<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\InstaConta;

/**
 * Class InstaContaTransformer.
 *
 * @package namespace App\Transformers;
 */
class InstaContaTransformer extends TransformerAbstract
{
    /**
     * Transform the InstaConta entity.
     *
     * @param \App\Entities\InstaConta $model
     *
     * @return array
     */
    public function transform(InstaConta $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'password'   => $model->password,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
