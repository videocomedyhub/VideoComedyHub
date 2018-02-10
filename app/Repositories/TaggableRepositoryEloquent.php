<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TaggableRepository;
use App\Entities\Taggable;
use App\Validators\TaggableValidator;

/**
 * Class TaggableRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TaggableRepositoryEloquent extends BaseRepository implements TaggableRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Taggable::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
