<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Repositories\VideoRepository;
use App\Entities\Favourite;
use App\Repositories\HistoryRepository;

class HomeController extends Controller {

    protected $videoRepo;
    protected $history;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VideoRepository $video, HistoryRepository $history) {
        $this->videoRepo = $video;
        $this->history = $history;
    }
    
    public function index() {
        $data = [
            'user' => Auth::user(),
        ];
        return view('frontend.user.about', $data);
    }
    public function favourite() {
        $data = [
            'user' => Auth::user(),
            'videos' => Auth::user()->favourites,
        ];
        return view('frontend.user.favourite', $data);
    }
    public function saved() {
        $videos = Auth::user()->history()->where('status','=','2')->get();
        $data = [
            'user' => Auth::user(),
            'videos' => $videos,
        ];
        return view('frontend.user.saved', $data);
    }
    public function watched() {
        $videos = Auth::user()->history()->where('status','=','1')->get();
        $data = [
            'user' => Auth::user(),
            'videos' => $videos,
        ];
        return view('frontend.user.watched', $data);
    }
    
        // Add Media Like
    public function favorite(Request $request)
    {
        $video_id = $request->input('video_id');
        $favorite = Favourite::where('user_id', '=', Auth::id())->where('video_id', '=', $video_id)->first();
        if (isset($favorite->id)) {
            $favorite->delete();
        } else {
            Auth::user()->favourites()->attach($video_id);
        }
        return redirect()->back();
    }


}
