<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\Entities\Video;

/**
 * Interface VideoRepository
 * @package namespace App\Repositories;
 */
interface VideoRepository extends RepositoryInterface
{
public function findByVideoId($videoId, array $with = []);
public function findBySlug($slug, array $with = []);
public function recentVideos($count);
public function relatedVideos(Video $video);
public function searchVideos($term);
public function searchCount($term);
public function featuredVideos();
public function newVideos();
public function popularVideos();
public function firstMap();
public function totalVideos();
public function getAllAdmin();
public function countAllAdmin();
public function addTagsToVideo(Video $video, array $tags);



}
