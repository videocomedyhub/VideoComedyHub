<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FavouriteRepository;
use App\Entities\Favourite;
use App\Validators\FavouriteValidator;

/**
 * Class FavouriteRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FavouriteRepositoryEloquent extends BaseRepository implements FavouriteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Favourite::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
