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
use Redirect;

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
            $this->processSingle($request);
        } elseif ($mode === 'channel') {
            $this->processChannel($request);
        } else {
            $this->processSearch($request);
        }
    }

    protected function processSingle(Request $request) {
        if (!empty($request->input('video'))) { // do more validation here, and for each items
            ImportSingleVideo::dispatch($request);
            return Redirect::route('admin.videos')->with(array('note' => 'New Video Successfully Added to Queue!', 'note_type' => 'success'));
        } else {
            return Redirect::route('admin.videos')->with(array('note' => 'you have not entererd any video link!', 'note_type' => 'error'));
        }
    }

    protected function processChannel(Request $request) {
        ImportChannelVideos::dispatch($request);
    }

    protected function processSearch(Request $request) {
        ImportSearchedVideos::dispatch($request);
    }

}
