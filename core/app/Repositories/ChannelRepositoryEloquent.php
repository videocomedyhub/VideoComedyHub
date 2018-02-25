<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ChannelRepository;
use App\Entities\Channel;
use App\Validators\ChannelValidator;
use Cache;

/**
 * Class ChannelRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ChannelRepositoryEloquent extends BaseRepository implements ChannelRepository {

    private $perPage = 40;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Channel::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByChannelId($channelId) {
        return $this->with(['videos', 'tags'])->model->where('channel_id', $channelId)->first();
    }

    public function existsByChannelId($channelId) {
        return $this->model->where('channel_id', $channelId)->first();
    }

    public function findBySlug($slug) {
        $that = $this;
        $channel = Cache::remember('channel_' . $slug, 1500, function() use($slug, $that) {
                    return $that->model->where('slug', '=', $slug)->first();
                });
        return $channel;
    }

    public function firstMap() {
        return $this->model->orderBy('updated_at', 'desc')->first();
    }

    public function videosByChannel(Channel $channel) {
        $page = empty(request()->input('page')) ? 1 : request()->input('page');
        $perPage = config('video.paginate', 40);
        $videos = Cache::remember($channel->slug . '_videos_page_' . $page, 1500, function() use ($channel, $perPage) {
                    return $channel->videos()->orderBy('published_at', 'desc')->paginate($perPage);
                });
        return $videos;
    }

    public function getAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->paginate(50);
    }

    public function countAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->count();
    }

}
