<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoryRepository;
use App\Entities\Category;
use App\Validators\CategoryValidator;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository {

    private $perPage = 40;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Category::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function firstMap() {
        return $this->model->orderBy('updated_at', 'desc')->first();
    }

    public function videosByCategory(Category $category) {
        $c = $category->channels();
        $v = $c->videos->orderBy('published_at', 'desc');
//        $v = $category->videos()->with(['channel'])->orderBy('published_at','desc');
        return $v->paginate($this->perPage);
    }

    public function featured() {
        return $this->orderBy('created_at', 'desc')->findByField('featured', 1);
    }

    public function widgetList() {
        return $this->model->has('channels')->get();
    }

    public function findBySlug($slug) {
        return $this->with(['tags', 'videos', 'channels'])->model->where('slug', '=', $slug)->first();
    }

    public function getAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->paginate(50);
    }

    public function countAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->count();
    }

}
