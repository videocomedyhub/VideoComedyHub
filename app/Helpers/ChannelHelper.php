<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use App\Repositories\ChannelRepository;
use App\Helpers\YouTubeHelper;

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
            return $channel;
        }
        return null;
    }

    public function channelExist($channelId) {
        $channel = $this->repo->findByChannelId($channelId);
        return empty($channel) ? false : true;
    }

}
