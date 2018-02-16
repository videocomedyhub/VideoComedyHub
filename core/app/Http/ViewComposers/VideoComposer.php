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
class VideoComposer {

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
        $featured = $this->videoRepo->featuredVideos();
        $newVideos = $this->videoRepo->newVideos();
        $popularVideos = $this->videoRepo->popularVideos();
        $featuredCategories = $this->categoryRepo->featured();
//        var_dump($featuredCategories);
//        die();
        
        $view->with(['featuredVideos' => $featured, 'featuredCategories' => $featuredCategories,
            'newVideos' => $newVideos, 'popularVideos' => $popularVideos, 'watchedVideos' => $newVideos]);
    }

}
