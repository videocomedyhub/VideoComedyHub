<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TagRepository
 * @package namespace App\Repositories;
 */
interface TagRepository extends RepositoryInterface {

    public function firstMap();

    public function addTags(array $tags);

    public function findBySlug($slug);
}
