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

class ImportSingleVideo implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $videoUrl;
    protected $category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        if ($request instanceof Request) {
            $this->videoUrl = $request->input('video');
            $this->category = $request->input('category');
        } else {
            $this->videoUrl = $request['video'];
            $this->category = $request['category'];
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        try {
            $video = $helper->getVideoInfo($this->videoUrl);
            if (is_array($video)) {
                $video['category'] = $this->category;
                VideoToDatabase::dispatch($video);
            }else{
                throw new \Exception("Array not returned from YouTube API");
            }
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
