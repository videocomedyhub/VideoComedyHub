<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoryRepository;
use App\Entities\Category;
use App\Validators\CategoryValidator;
use Cache;

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
        $page = empty(request()->input('page')) ? 1 : request()->input('page');
        $perPage = config('video.paginate', $this->perPage);
        $videos = Cache::remember($category->slug . '_videos_page_' . $page, 1500, function() use ($category, $perPage) {
                    return $category->videos()->with('channel:id,title,slug')->orderBy('published_at', 'desc')->paginate($perPage);
                });
        return $videos;
    }

    public function featured($count = null) {
        $that = $this;
        $count = (empty($count)) ? config('video.count', 40) : $count;
        $categories = Cache::remember('categories_featured', 1500, function()use ($count, $that) {
                    $that->orderBy('created_at', 'desc')->model->where('featured', 1);
                    return $that->paginate($count);
                });
        return $categories;
    }

    public function widgetList() {
        $that = $this;
        $categories = Cache::remember('categories_widget', 1500, function()use($that) {
                    return $that->model->take(10)->get(['id', 'title', 'slug']);
                });
        return $categories;
    }

    public function findBySlug($slug) {
        $that = $this;
        $category = Cache::remember('category_' . $slug, 1500, function() use($slug, $that) {
                    return $that->model->where('slug', '=', $slug)->first();
                });
        return $category;
    }

    public function getAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->paginate(50);
    }

    public function countAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->count();
    }

}
