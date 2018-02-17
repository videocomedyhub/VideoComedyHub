<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use App\Helpers\YouTubeHelper;
use App\Jobs\VideoToDatabase;
use App\Repositories\VideoRepository;
use App\Entities\Video;

class ImportMultipleVideos implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $vIds;
    protected $category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        if ($request instanceof Request) {
            $this->category = $request->input('category');
            $this->vIds = $this->filterVideos($request->input('videos'));
        } else {
            $this->category = $request['category'];
            $this->vIds = $this->filterVideos($request['videos']);
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        if (count($this->vIds) > 0) {
            $videos = $helper->getVideosInfo($this->vIds);
            foreach ($videos as $video) {
                $video['category'] = $this->category;
                VideoToDatabase::dispatch($video);
            }
        }
    }

    public function filterVideos(array $vIds) {
        $filtered = [];
        foreach ($vIds as $v) {
            $vid = Video::where('video_id', $v)->first();
            if (!$vid) {
                array_push($filtered, $v);
            }
        }
        return $filtered;
    }

}
