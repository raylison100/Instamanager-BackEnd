<?php

namespace App\Presenters;

use App\Transformers\InstaContaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InstaContaPresenter.
 *
 * @package namespace App\Presenters;
 */
class InstaContaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InstaContaTransformer();
    }
}
