<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use Carbon\Carbon;

class IndexController extends Controller {

    protected $videoRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VideoRepository $video) {
        $this->videoRepo = $video;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('frontend.index.index');
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
            echo asset('images');
            die();
    }

    public function testTime(VideoRepository $vid) {
        $v = $vid->find(1);
        $v->published_at = Carbon::parse('2016-04-29T09:02:22.000Z')->toDateTimeString();
        $v->save();
    }

}