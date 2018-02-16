<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface HistoryRepository
 * @package namespace App\Repositories;
 */
interface HistoryRepository extends RepositoryInterface
{
   public function countWatched($videoId);
   public function watched($userId);
   public function saved($userId);
}
