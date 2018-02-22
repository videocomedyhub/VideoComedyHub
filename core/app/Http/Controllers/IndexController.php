<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use Carbon\Carbon;
use App\Helpers\YouTubeHelper;
use App\Repositories\CategoryRepository;
use App\Repositories\ChannelRepository;

class IndexController extends Controller {

    protected $videoRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VideoRepository $video, CategoryRepository $category, ChannelRepository $channel) {
        $this->videoRepo = $video;
        $this->channelRepo = $channel;
        $this->categoryRepo = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $featuredVideos = $this->videoRepo->featuredVideos(15);
       // $watchedVideos = $featuredVideos;
        $newVideos = $this->videoRepo->newVideos(20);
        $popularVideos = $this->videoRepo->popularVideos(20);
        $featuredCategories = $this->categoryRepo->featured(15);
        return view('frontend.index.index', compact('featuredVideos','featuredCategories','newVideos','popularVideos'));
    }

    public function search() {
        $query = request()->has('q') ? request()->get('q') : $q;
        if (!$query)
            return redirect()->route('index');

        $title = "Search Results for “{$query}”";
        $videos = $this->videoRepo->searchVideos($query);
        $count = $this->videoRepo->searchCount($query);
        return view('frontend.index.search')->with(compact('videos', 'query', 'count', 'title'));
    }

    public function test(YouTubeHelper $helper) {
        $params = $helper->getSearchChannelParams('comedy');
        $results = $helper->paginatedChannelSearch($params, null);
        $filts = $this->filterChannels($results['channels']);

        echo '<pre>';
        var_dump($params);
        var_dump($results);
        var_dump($filts);
        die();
    }

    public function testTime(VideoRepository $vid) {
        $v = $vid->find(1);
        $v->published_at = Carbon::parse('2016-04-29T09:02:22.000Z')->toDateTimeString();
        $v->save();
    }

}
