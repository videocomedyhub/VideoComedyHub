<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use App\Entities\Permission;
use App\Entities\Role;
use App\Repositories\PageRepository;
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
        return view('frontend.index');
    }

    public function search() {
        $query = request()->has('q') ? request()->get('q') : $q;
        if (!$query)
            return redirect()->route('index');

        $videos = $this->videoRepo->searchVideos($query);
        $count = $this->videoRepo->searchCount($query);
        return view('frontend.search')->with(compact('videos', 'query', 'count'));
    }

    public function test(\App\Helpers\YouTubeHelper $helper) {
            echo '<pre>';
        try {
            $params = $helper->getSearchChannelParams('comedys');
            $results = $helper->getResultInfo($params);
            var_dump($results);
            
            $pages = $helper->paginatedChannelSearch($params);
            var_dump($pages);
            
//       var_dump($vids);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function testTime(VideoRepository $vid) {
        $v = $vid->find(1);
        $v->published_at = Carbon::parse('2016-04-29T09:02:22.000Z')->toDateTimeString();
        $v->save();
    }

}
