<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends RepositoryInterface
{
    public function firstMap();
    public function videosByCategory(\App\Entities\Category $category);
    public function featured();
    public function findBySlug($slug);
    public function widgetList();
    public function getAllAdmin();
public function countAllAdmin();
}
