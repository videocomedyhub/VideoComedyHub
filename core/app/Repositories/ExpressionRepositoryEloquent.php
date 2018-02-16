<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ExpressionRepository;
use App\Entities\Expression;
use App\Validators\ExpressionValidator;

/**
 * Class ExpressionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ExpressionRepositoryEloquent extends BaseRepository implements ExpressionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Expression::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
