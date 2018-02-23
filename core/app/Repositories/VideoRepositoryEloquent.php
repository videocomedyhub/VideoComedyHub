<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VideoRepository;
use App\Entities\Video;
use App\Validators\VideoValidator;
use App\Entities\Scopes\ActiveScope;
use Cache;

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

    public function featuredVideos($count = null) {
        $page = empty(request()->input('page')) ? 1 : request()->input('page');
        $count = (empty($count)) ? config('video.count', 40) : $count;
        $that = $this;
        $videos = Cache::remember('featured_videos_' . $page, 1500, function() use ($count, $that) {
                    $that->orderBy('published_at', 'desc')->model->where('featured', 1);
                    return $that->paginate($count);
                });
        return $videos;
    }

    public function newVideos($count = null) {
        $page = empty(request()->input('page')) ? 1 : request()->input('page');
        $count = (empty($count)) ? config('video.count', 40) : $count;
        $that = $this;
        $videos = Cache::remember('new_videos_' . $page, 1500, function() use($count, $that) {
                    return $that->orderBy('published_at', 'desc')->paginate($count);
                });
        return $videos;
    }

    public function findByVideoId($videoId, array $with = ['channel', 'tags']) {
        $that = $this;
        $video = Cache::remember($videoId, 1500, function()use ($videoId, $with, $that) {
                    return $that->with($with)->model->where('video_id', '=', $videoId)->first();
                });
        return $video;
    }

    public function findBySlug($slug, array $with = ['channel']) {
        $that = $this;
        $video = Cache::remember('video_' . $slug, 1500, function() use($slug, $with, $that) {
                    return $that->with($with)->model->where('slug', '=', $slug)->first();
                });
        return $video;
    }

    public function popularVideos($count = null) {
        $page = empty(request()->input('page')) ? 1 : request()->input('page');
        $count = empty($count) ? config('video.count', 40) : $count;
        $that = $this;
        $videos = Cache::remember('popular_videos_' . $page, 1500, function()use ($count, $that) {
                    return $that->orderBy('count', 'desc')->paginate($count);
                });
        return $videos;
    }

    public function recentVideos($count) {
        
    }

    public function relatedVideos(Video $video) {
        $count = config('video.related', 5);
        $that = $this;
        $videos = Cache::remember('related_video_' . $video->slug, 1500, function() use($video, $count, $that) {
            return $that->model->whereHas('channel', function($q)use ($video) {
                        $q->where('id', '=', $video->channel->id);
                    })->where('id', '!=', $video->id)->take($count)->get();
        });
        return $videos;
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
