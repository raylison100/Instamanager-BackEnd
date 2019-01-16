<?php
/**
 * Created by PhpStorm.
 * User: raylison
 * Date: 09/01/19
 * Time: 10:44
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the InstaConta entity.
     *
     * @param \App\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'            => (int) $model->id,
            'name'          => $model->name,
            'email'         => $model->email,
            'password'      => $model->password,
            'contaInsta_id' => $model->contaInsta_id,
            'created_at'    => $model->created_at->toDateTimeString(),
            'updated_at'    => $model->updated_at->toDateTimeString()
        ];
    }
}
