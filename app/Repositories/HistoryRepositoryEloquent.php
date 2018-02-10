<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HistoryRepository;
use App\Entities\History;
use App\Validators\HistoryValidator;

/**
 * Class HistoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class HistoryRepositoryEloquent extends BaseRepository implements HistoryRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return History::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function countWatched($videoId) {
       return $this->model->where('video_id','=',$videoId)->watched()->count();
    }
    public function watched($user) {
       return $this->model->where('user_id','=',$user)->watched()->get();
    }
    public function saved($user) {
       return $this->model->where('user_id','=',$user)->saved()->get();
    }

}
