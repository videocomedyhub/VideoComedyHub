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
//        $videoCount = $this->videoRepo->totalVideos();
        return view('frontend.index.index', compact('featuredVideos', 'featuredCategories', 'newVideos', 'popularVideos'));
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

    public function test() {
        $video = $this->videoRepo->findBySlug('who-died-mark-angel-comedy-episode-147');
        $e = [
            "@context" => "http://schema.org",
            "@type" => "VideoObject",
            "name" => $video->title,
            "description" => $video->description,
            "thumbnailUrl" => [
                $video->default_thumbnail,
                $video->medium_thumbnail,
                $video->high_thumbnail,
            ],
            "uploadDate" => $video->atom_time,
            "duration" => $video->atom_duration,
            "embedUrl" => config('youtube.embed'). $video->video_id,
            "interactionCount" => $video->count
        ];
//        echo json_encode($e);
        return view('welcome');
    }

    public function testTime(VideoRepository $vid) {
        $v = $vid->find(1);
        $v->published_at = Carbon::parse('2016-04-29T09:02:22.000Z')->toDateTimeString();
        $v->save();
    }

}
