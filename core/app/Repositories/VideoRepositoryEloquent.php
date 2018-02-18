<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VideoRepository;
use App\Entities\Video;
use App\Validators\VideoValidator;
use App\Entities\Scopes\ActiveScope;
/**
 * Class VideoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VideoRepositoryEloquent extends BaseRepository implements VideoRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Video::class;
    }

    /**
     * Count total Videos Added
     */
    public function totalVideos() {
        return $this->model->count();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function featuredVideos() {
        return $this->orderBy('published_at', 'desc')->findByField('featured', 1);
    }

    public function newVideos($count = null) {
        $count = (empty($count))?config('video.count', 40): $count;
        $this->orderBy('published_at', 'desc');
        return $this->paginate($count);
    }

    public function findByVideoId($videoId, array $with = ['channel', 'tags']) {
        $this->with($with)->model->where('video_id', '=', $videoId);
        return $this->first();
    }

    public function findBySlug($slug, array $with = ['channel', 'tags']) {
        $this->with($with)->model->where('slug', '=', $slug);
        return $this->first();
    }

    public function popularVideos($count = null) {
        $count = empty($count)?config('video.count', 40): $count;
        $this->orderBy('count', 'desc');
        return $this->paginate($count);
    }

    public function recentVideos($count) {
        
    }

    public function relatedVideos(Video $video) {
        $count = config('video.count', 40);
        $this->model = $this->model->whereHas('channel', function($q)use ($video) {
                    $q->where('id', '=', $video->channel->id);
                })->where('id', '!=', $video->id)->take($count);
        return $this->get();
    }

    public function firstMap() {
        return $this->orderBy('updated_at', 'desc')->first();
    }

    public function searchVideos($term) {
        $count = config('video.per_page');
        if (request()->input('per_page'))
            $count = request()->input('per_page');
        $this->orderBy('published_at', 'desc');
        $this->model = $this->model->where('title', 'LIKE', '%' . $term . '%');
        return $this->paginate($count);
    }

    public function searchCount($term) {
        return $this->model->where('title', 'LIKE', '%' . $term . '%')->count();
    }

    public function getAllAdmin() {
        return $this->model->with(['channel'])->withoutGlobalScope(ActiveScope::class)->paginate(50);
    }
    public function countAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->count();
    }
    public function addTagsToVideo(Video $video, array $tags) {
        $tagIds = [];
        foreach ($tags as $t) {
            $tagIds[] = $t->id;
        }
        $video->tags()->syncWithoutDetaching($tagIds);
    }
    
    public function existsByVideoId($videeoId) {
        return $this->model->where('video_id', $videeoId)->first();
    }
    

}
