<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TagRepository;
use App\Entities\Tag;
use App\Validators\TagValidator;

/**
 * Class TagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TagRepositoryEloquent extends BaseRepository implements TagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function firstMap() {
        return $this->model()->orderBy('updated_at', 'desc')->first();
    }
    
    public function addTags(array $tags) {
        $result = [];
        foreach ($tags as $t) {
        $tag = $this->model->where('name','=', $t)->first();
        if($tag instanceof Tag){
            $result[] = $tag;
            continue;
        }
        $result[] = $this->create(['name' => $t]);
        }
        return $result;
    }
    
}
