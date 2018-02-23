<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Entities\Video;

class VerifyVideoExist implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

        Video::chunk(200, function($videos) {
            foreach ($videos as $v) {
                $headers = get_headers('http://www.youtube.com/oembed?url=https://youtube.com/watch?v=' . $v->video_id);
                if (!strpos($headers[0], '200')) {
                    $v->delete();
                }
            }
        });
    }

}
