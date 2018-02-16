<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ChannelRepository;
use App\Entities\Channel;
use App\Validators\ChannelValidator;

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
        return $this->with(['videos', 'tags'])->model->where('slug', '=', $slug)->first();
    }

    public function firstMap() {
        return $this->model->orderBy('updated_at', 'desc')->first();
    }

    public function videosByChannel(Channel $channel) {
        $perPage = config('video.paginate', 40);
        $v = $channel->videos()->with(['channel'])->orderBy('published_at', 'desc');
        return $v->paginate($perPage);
    }

    public function getAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->paginate(50);
    }

    public function countAllAdmin() {
        return $this->model->withoutGlobalScope(ActiveScope::class)->count();
    }

}
