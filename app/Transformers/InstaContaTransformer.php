<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\InstagramAccount;

/**
 * Class InstaContaTransformer.
 *
 * @package namespace App\Transformers;
 */
class InstaContaTransformer extends TransformerAbstract
{
    /**
     * Transform the InstagramAccount entity.
     *
     * @param \App\Entities\InstagramAccount $model
     *
     * @return array
     */
    public function transform(InstagramAccount $model)
    {
        return [
            'id'                => (int) $model->id,
            'name'              => $model->name,
            'password'          => $model->password,
            'apiKey'            => $model->apiKey,
            'apiSecret'         => $model->apiSecret,
            'apiCallback'       => $model->apiCallback,
            'curtidasQTD'       => $model->curtidasQTD,
            'seguidoresQTD'     => $model->seguidoresQTD,
            'comentariosQTD'    => $model->comentarioQTD,
            'created_at'        => $model->created_at->toDateTimeString(),
            'updated_at'        => $model->updated_at->toDateTimeString()
        ];
    }
}
