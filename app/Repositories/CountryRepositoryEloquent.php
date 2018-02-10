<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CountryRepository;
use App\Entities\Country;
use App\Validators\CountryValidator;

/**
 * Class CountryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CountryRepositoryEloquent extends BaseRepository implements CountryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Country::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
