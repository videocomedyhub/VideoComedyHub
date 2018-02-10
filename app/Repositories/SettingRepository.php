<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SettingRepository
 * @package namespace App\Repositories;
 */
interface SettingRepository extends RepositoryInterface
{
    public function getYouTubeApi();
}
