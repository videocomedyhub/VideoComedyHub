<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use App\Repositories\ChannelRepository;
use App\Helpers\YouTubeHelper;
use App\Jobs\ImportChannelVideos;
use Carbon\Carbon;

/**
 * Description of ChannelHelper
 *
 * @author johnn
 */
class ChannelHelper {

    protected $repo;
    protected $helper;

    public function __construct(ChannelRepository $channelRepo, YouTubeHelper $yHelper) {
        $this->repo = $channelRepo;
        $this->helper = $yHelper;
    }

    public function addNewChannel($channelId, $category) {
        $ch = $this->helper->getChannelFromId($channelId);
        if (is_array($ch)) {
            $ch['user_id'] = config('youtube.user', 1);
            $channel = $this->repo->create($ch);
            $channel->categories()->attach($category);

            // start importing the channel videos
            ImportChannelVideos::dispatch(['channel' => $channel->channel_id, 'category' => $category]);
            // update last updated
            $date = new Carbon();
            $channel->last_fetched = $date->toDateTimeString();
            $channel->save();

            return $channel;
        } else {
            throw new \Exception("Unable to add channel with ID: $channelId");
        }
        return null;
    }

    public function channelExist($channelId) {
        $channel = $this->repo->existsByChannelId($channelId);
        return empty($channel) ? false : true;
    }

}
