<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StatisticRepository;
use App\Entities\Statistic;
use App\Validators\StatisticValidator;

/**
 * Class StatisticRepositoryEloquent
 * @package namespace App\Repositories;
 */
class StatisticRepositoryEloquent extends BaseRepository implements StatisticRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Statistic::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
