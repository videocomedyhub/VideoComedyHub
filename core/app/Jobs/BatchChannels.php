<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helpers\YouTubeHelper;

class BatchChannels implements ShouldQueue {

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
    public function __construct(array $params, $category, $token = null) {
        $this->params = $params;
        $this->token = $token;
        $this->category = $category;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        $results = $helper->paginatedChannelSearch($this->params, $this->token);
        ImportMultipleChannels::dispatch(['channels' => $results['channels'], 'category' => $this->category]);
        // sending the next batch of channels to self Job.
        if (!empty($results['next'])) {
            self::dispatch($this->params, $this->category, $results['next']);
        }
    }

}
