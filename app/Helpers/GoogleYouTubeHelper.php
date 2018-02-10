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
use Google_Client;
use Google_Service_YouTube;
/**
 * Description of GoogleYouTubeHelper
 *
 * @author johnn
 */
class GoogleYouTubeHelper {

    protected $api;
    protected $client;
    protected $keys = [];

    public function __construct(SettingRepository $settings) {
        if (empty($this->keys)) {
            $this->keys = $settings->getYouTubeApi();
        }
        $key = $this->keys->shuffle()->first();
        $this->client = new Google_Client();
        $this->client->setDeveloperKey($key);
        $this->api = new Google_Service_YouTube($this->client);
        
    }
    
    public function getVideoInfo($vId) {
        $this->api->videos;
    }

}
