<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use App\Helpers\YouTubeHelper;
use App\Jobs\BatchVideos;
class ImportChannelVideos implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $channelId;
    protected $category;
    protected $query;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        if ($request instanceof Request) {
            $this->channelId = $request->input('channel');
            $this->category = $request->input('category');
            if ($request->has('query')) {
                $this->query = $request->input('query');
            }
        } else {
            $this->channelId = $request['channel'];
            $this->category = $request['category'];
            if (array_key_exists('query', $request)) {
                $this->query = $request['query'];
            }
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        try {
            if(!empty($this->query)){
                $params =  $helper->getChannelVideoParams($this->query, $this->channelId, 30);
                BatchVideos::dispatch($params, $this->category);
            }else{
                $params =  $helper->getChannelVideoListParams($this->channelId, 30);
                BatchVideos::dispatch($params, $this->category);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
