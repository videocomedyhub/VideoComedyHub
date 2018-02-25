<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use App\Entities\Video;
use App\Events\VideoWatched;
use Cache;

class VideoController extends Controller {

    protected $videoRepo;

    public function __construct(VideoRepository $video) {
        $this->videoRepo = $video;
    }

    public function index(Request $request) {
        $title = "All Videos";
        $videos = $this->videoRepo->newVideos();
        return view('frontend.videos.new')->with(compact('videos', 'title'));
    }

    public function newVideos() {
        $title = "New Videos";
        $videos = $this->videoRepo->newVideos();
        return view('frontend.videos.new')->with(compact('videos', 'title'));
    }

    public function popularVideos() {
        $title = "Popular Videos";
        $videos = $this->videoRepo->popularVideos();
        return view('frontend.videos.popular')->with(compact('videos', 'title'));
    }

    public function watch($videoId) {

        $data = Cache::remember($videoId, 20, function () use ($videoId) {
                    $data = [];
                    $data['video'] = $this->videoRepo->findByVideoId($videoId);
                    if (!($data['video'] instanceof Video)) {
                        return redirect('/');
                    }
                    $data['vidTags'] = $this->videoRepo->tagsByVideo($data['video']);
                    $data['vidCategories'] = $this->videoRepo->categoriesByVideo($data['video']);
                    $data['relatedVideos'] = $this->videoRepo->relatedVideos($data['video']);
                    $data['nextVideos'] = $data['relatedVideos'];
                    $data['comments'] = [];

                    // adding ld+json structured data
                    $e = [
                        "@context" => "http://schema.org",
                        "@type" => "VideoObject",
                        "name" => $data['video']->title,
                        "description" => $data['video']->description,
                        "thumbnailUrl" => [
                            $data['video']->default_thumbnail,
                            $data['video']->medium_thumbnail,
                            $data['video']->high_thumbnail,
                        ],
                        "uploadDate" => $data['video']->atom_time,
                        "duration" => $data['video']->atom_duration,
                        "embedUrl" => config('youtube.embed') . $data['video']->video_id,
                        "interactionCount" => $data['video']->count
                    ];
                    $data['structured'] = json_encode($e);
                    return $data;
                });

        if (array_key_exists('video', $data)) {
            // event to notify video is being watched or opened
            event(new VideoWatched($data['video']));
        }
        return view('frontend.videos.watch', $data);
    }

    public function single($slug) {

        $data = [];
        $data['video'] = $this->videoRepo->findBySlug($slug, ['channel']);
        if (!($data['video'] instanceof Video)) {
            return redirect('/');
        }
        $data['vidTags'] = $this->videoRepo->tagsByVideo($data['video']);
        $data['vidCategories'] = $this->videoRepo->categoriesByVideo($data['video']);
        $data['relatedVideos'] = $this->videoRepo->relatedVideos($data['video']);
        $data['nextVideos'] = $data['relatedVideos'];
        $data['comments'] = [];

        // adding ld+json structured data
        $e = [
            "@context" => "http://schema.org",
            "@type" => "VideoObject",
            "name" => $data['video']->title,
            "description" => $data['video']->description,
            "thumbnailUrl" => [
                $data['video']->default_thumbnail,
                $data['video']->medium_thumbnail,
                $data['video']->high_thumbnail,
            ],
            "uploadDate" => $data['video']->atom_time,
            "duration" => $data['video']->atom_duration,
            "embedUrl" => config('youtube.embed') . $data['video']->video_id,
            "interactionCount" => $data['video']->count
        ];
        $data['structured'] = json_encode($e);
        if (array_key_exists('video', $data)) {
            // event to notify video is being watched or opened
            event(new VideoWatched($data['video']));
        }

        return view('frontend.videos.item', $data);
    }

}
