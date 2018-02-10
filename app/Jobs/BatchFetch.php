<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helpers\YouTubeHelper;
use App\Jobs\ImportMultipleVideos;

class BatchFetch implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $params;
    protected $token;
    protected $category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $params,$category, $token = null) {
        $this->params = $params;
        $this->token = $token;
        $this->category =  $category;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        $results = $helper->paginatedVideoSearch($this->params, $this->token);
        ImportMultipleVideos::dispatch(['videos' => $results['videos'], 'category' => $this->category]);
        // sending the next batch of videos to self Job.
        if(!empty($results['next'])){
            self::dispatch($this->params, $this->category, $results['next']);
        }
        
    }

}
