<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VideoRepository;
use App\Entities\Video;
use App\Entities\Category;
use App\Jobs\ImportSingleVideo;
use App\Jobs\ImportChannelVideos;
use App\Jobs\ImportSearchedVideos;

class AdminVideoController extends Controller {

    protected $videoRepo;

    public function __construct(VideoRepository $video) {
        $this->videoRepo = $video;
    }

    public function index() {
        $videos = $this->videoRepo->getAllAdmin();

        $data = [
            'title' => 'Video List',
            'videos' => $videos,
        ];
        return view('backend.videos.index', $data);
    }

    public function import() {
        $categories = Category::all(['id', 'title']);

        $data = [
            'title' => 'Import Videos',
            'categories' => $categories,
        ];
        return view('backend.videos.import', $data);
    }

    public function postImport(Request $request) {
        $mode = $request->input('mode');
        if ($mode === 'single') {

            if (!empty($request->input('video'))) { // do more validation here, and for each items
                ImportSingleVideo::dispatch($request);
                echo 'Video has been added to the database';
            } else {
                echo "YOu've not entererd any video link";
            }
        } elseif ($mode === 'channel') {
            ImportChannelVideos::dispatch($request);
        } else {
            ImportSearchedVideos::dispatch($request);
        }
    }

    public function processSingle(Request $request) {
        
        
        ImportSingleVideo::dispatch($request);
    }

    public function processChannel(Request $request) {
        
        ImportChannelVideos::dispatch($request);
        
    }

    public function processSearch(Request $request) {
        
        
        ImportSearchedVideos::dispatch($request);
    }

}
