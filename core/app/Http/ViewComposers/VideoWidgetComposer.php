<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\VideoRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ChannelRepository;

/**
 * Description of VideoComposer
 *
 * @author johnn
 */
class VideoWidgetComposer {

    protected $videoRepo;
    protected $categoryRepo;
    protected $channelRepo;

    public function __construct(VideoRepository $video, CategoryRepository $category, ChannelRepository $channel) {
        $this->videoRepo = $video;
        $this->categoryRepo = $category;
        $this->channelRepo = $channel;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $trending = $this->videoRepo->popularVideos(10);
        $categories = $this->categoryRepo->widgetList();
        
        $view->with(['trendingVideos' => $trending, 'cats' => $categories]);
    }

}
