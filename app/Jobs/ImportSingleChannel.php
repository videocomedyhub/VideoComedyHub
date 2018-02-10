<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use App\Helpers\YouTubeHelper;

class ImportSingleChannel implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $channelId;
    protected $category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        if ($request instanceof Request) {
            $this->channelId = $request->input('channel');
            $this->category = $request->input('category');
        } else {
            $this->channelId = $request['channel'];
            $this->category = $request['category'];
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        
    }

}
