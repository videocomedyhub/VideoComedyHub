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
            $this->vIds = $request->input('videos');
        } else {
            $this->category = $request['category'];
            $this->vIds = $request['videos'];
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        try {
            $videos = $helper->getVideosInfo($this->vIds);
            foreach ($videos as $video) {
                $video['category'] = $this->category;
                VideoToDatabase::dispatch($video);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
