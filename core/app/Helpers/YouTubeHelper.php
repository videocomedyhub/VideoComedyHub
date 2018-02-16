<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Cache;
use Carbon\Carbon;
use App\Repositories\SettingRepository;
use App\Repositories\VideoRepository;

/**
 * Description of YouTubeHelper
 *
 * @author johnn
 */
class YouTubeHelper {

    // TODO: learn to use publishedAfter parameter of YouTube API, this is useful for checking for new items
    protected $api;
    protected $keys = [];
    protected $videoRepo;

    public function __construct(SettingRepository $settings, VideoRepository $videoRepo) {
        if (empty($this->keys)) {
            $this->keys = $settings->getYouTubeApi();
        }
        $key = $this->keys->shuffle()->first();
        $this->api = new Youtube(['key' => $key->value]);
        $this->videoRepo = $videoRepo;
    }

    protected function timeDuration($item) {
        $timeDuration = '00:00';
        if (isset($item->contentDetails->duration)) {
            $time = new \DateInterval($item->contentDetails->duration);
            if ($time->h > 0) {
                $timeDuration = $time->format('%H:%I:%S');
            } else {
                $timeDuration = $time->format('%I:%S');
            }
        }
        return $timeDuration;
    }

    /**
     * imageUrl()
     * Get Video Image Link
     *
     * @param $item object
     * @return String
     * */
    protected function getImageUrl($item) {

        $imageUrl = [];
        if (isset($item->snippet->thumbnails->high)) {
            $imageUrl['high'] = $item->snippet->thumbnails->high->url;
        } else {
            $imageUrl['high'] = '';
        }
        if (isset($item->snippet->thumbnails->medium)) {
            $imageUrl['medium'] = $item->snippet->thumbnails->medium->url;
        } else {
            $imageUrl['medium'] = '';
        }
        if (isset($item->snippet->thumbnails->default)) {
            $imageUrl['default'] = $item->snippet->thumbnails->default->url;
        } else {
            $imageUrl['default'] = '';
        }
        return $imageUrl;
    }

    protected function getRegion($item) {
        $r = config('youtube.region');
        if (isset($item->snippet->country)) {
            $r = $item->snippet->country;
        }
        return $r;
    }

    protected function processVideos($items) {
        $resultArray = [];
        if (is_array($items)) {
            foreach ($items as $i) {
                $resultArray[] = $this->processVideo($i);
            }
        } else {
            $resultArray[] = $this->processVideo($items);
        }
        return $resultArray;
    }

    protected function processChannels($items) {
        $resultArray = [];
        if (is_array($items)) {
            foreach ($items as $i) {
                $resultArray[] = $this->processChannel($i);
            }
        } else {
            $resultArray[] = $this->processChannel($items);
        }
        return $resultArray;
    }

    protected function processVideo($item) {
        $time = $this->timeDuration($item);
        $images = $this->getImageUrl($item);
        $result = [];
        if (isset($item->id)) {
            $result = [
                'video_id' => $item->id,
                'title' => $item->snippet->title,
                'description' => $item->snippet->description,
                'duration' => $time,
                'channel_id' => $item->snippet->channelId,
                'default_thumbnail' => $images['default'],
                'medium_thumbnail' => $images['medium'],
                'high_thumbnail' => $images['high'],
                'seo_title' => $item->snippet->title,
                'seo_description' => $item->snippet->description,
                'active' => 1,
                'featured' => 0,
                'count' => $item->statistics->viewCount,
                'platform' => 'youtube',
                'published_at' => Carbon::parse($item->snippet->publishedAt)->toDateTimeString(),
            ];
            if (isset($item->snippet->tags)) {
                $result['tags'] = $item->snippet->tags;
            } else {
                $result['tags'] = ['comedy', 'youtube comedy'];
            }
        }
        return $result;
    }

    public function processChannel($item) {
        $images = $this->getImageUrl($item);
        $region = $this->getRegion($item);

        $result = [];
        if (isset($item->id)) {
            $result = [
                'channel_id' => $item->id,
                'title' => $item->snippet->title,
                'description' => $item->snippet->description,
                'region' => $region,
                'default_thumbnail' => $images['default'],
                'medium_thumbnail' => $images['medium'],
                'high_thumbnail' => $images['high'],
                'seo_title' => $item->snippet->title,
                'seo_description' => $item->snippet->description,
                'active' => 1,
                'featured' => 0,
                'published_at' => Carbon::parse($item->snippet->publishedAt)->toDateTimeString(),
            ];
        }
        return $result;
    }

    public function getVideoInfo($vId) {
        $vId = $this->api->parseVIdFromURL($vId);

        $that = $this;
        $data = Cache::remember('video_info_' . $vId, 1800, function() use($that, $vId) {
                    return $that->api->getVideoInfo($vId);
                });
        return $this->processVideo($data);
    }

    public function getVideosInfo($vIds) {
        $videos = $this->api->getVideosInfo($vIds);
        return $this->processVideos($videos);
    }

    public function getChannelInfo($cId) {
        if (strpos($cId, 'youtube')) {
            return $this->getChannelFromUrl($cId);
        } else {
            return $this->getChannelFromId($cId);
        }
    }
        public function getChannelsInfo($cIds) {
        $channels = $this->api->getChannelsById($cIds);
        return $this->processChannels($channels);
    }

    public function getChannelFromId($cId) {
        $that = $this;
        $data = Cache::remember('channel_info_' . $cId, 1800, function() use($that, $cId) {
                    return $that->api->getChannelById($cId);
                });
        return $this->processChannel($data);
    }

    public function getChannelFromUrl($url) {
        $that = $this;
        $data = Cache::remember('channel_info_' . $url, 1800, function() use($that, $url) {
                    return $that->api->getChannelFromURL($url);
                });
        return $this->processChannel($data);
    }

    public function getChannelVideoParams($query, $channelId, $max = 30) {
        return $this->api->getChannelVideosParams($channelId, $query, $max);
    }

    public function getChannelVideoListParams($channelId, $max = 30) {
        return $this->api->getChannelVideosParams($channelId, null, $max);
    }

    public function getSearchVideoParams($query, $max = 40, $region = null) {
        return $this->api->getSearchParams($query, 'video', $max, $region);
    }

    public function getSearchChannelParams($query, $max = 40, $region = null) {
        return $this->api->getSearchParams($query, 'channel', $max, $region);
    }

    public function getResultInfo(array $params) {
        return $this->api->getResultInfo($params);
    }

    public function paginatedVideoSearch($params, $token = null) {
        $result = $this->api->paginateResults($params, $token);
        $vIds = [];
        foreach ($result['results'] as $v) {
            array_push($vIds, $v->id->videoId);
        }
        return ['videos' => $vIds, 'next' => $result['info']['nextPageToken'], 'prev' => $result['info']['prevPageToken']];
    }
    public function paginatedChannelSearch($params, $token = null) {
        $result = $this->api->paginateResults($params, $token);
        $cIds = [];
        foreach ($result['results'] as $c) {
            array_push($cIds, $c->id->channelId);
        }
        return ['channels' => $cIds, 'next' => $result['info']['nextPageToken'], 'prev' => $result['info']['prevPageToken']];
    }

    public function searchChannelVideos($query, $channelId) {
        $vIds = [];
        $results = [];
        $res = $this->api->searchChannelVideos($query, $channelId, config('youtube.max'));
        if (is_array($res['results'])) {
            $results = array_merge($results, $res['results']);
        } else {
            return $vIds;
        }
        while ($res['info']['nextPageToken'] !== null) {
            $extra = ['pageToken' => $res['info']['nextPageToken']];
            $res = $this->api->searchChannelVideos($query, $channelId, config('youtube.max'), null, $extra);
            if (is_array($res['results'])) {
                $results = array_merge($results, $res['results']);
            }
        }
        foreach ($results as $r) {
            array_push($vIds, $r->id->videoId);
        }
        return $vIds;
    }

}
