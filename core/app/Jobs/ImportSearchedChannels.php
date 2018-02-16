<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helpers\YouTubeHelper;
class ImportSearchedChannels implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        protected $category;
    protected $query;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        if ($request instanceof Request) {
            $this->category = $request->input('category');
            $this->query = $request->input('query');
        } else {
            $this->category = $request['category'];
            $this->query = $request['query'];
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        try {
            $params = $helper->getSearchChannelParams($this->query);
            BatchChannels::dispatch($params, $this->category);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
