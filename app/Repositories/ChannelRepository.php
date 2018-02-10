<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ChannelRepository
 * @package namespace App\Repositories;
 */
interface ChannelRepository extends RepositoryInterface {

    public function findByChannelId($channelId);
    public function findBySlug($slug);

    public function firstMap();

    public function videosByChannel(\App\Entities\Channel $category);
}
