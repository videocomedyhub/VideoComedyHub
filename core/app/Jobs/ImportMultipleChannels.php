<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use App\Helpers\YouTubeHelper;
use App\Helpers\ChannelHelper;
use App\Entities\Channel;

class ImportMultipleChannels implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $cIds;
    protected $category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        if ($request instanceof Request) {
            $this->category = $request->input('category');
            $this->cIds = $this->filterChannels($request->input('channels'));
        } else {
            $this->category = $request['category'];
            $this->cIds = $this->filterChannels($request['channels']);
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YouTubeHelper $helper) {
        if (count($this->cIds) > 0) {
            $channels = $helper->getChannelsInfo($this->cIds);
            foreach ($channels as $ch) {
                $ch['category'] = $this->category;
                ChannelToDatabase::dispatch($ch);
            }
        }
    }

    public function filterChannels(array $cIds) {
        $filtered = [];
        foreach ($cIds as $c) {
            $ch = Channel::where('channel_id', $c)->first();
            if(!$ch){
                array_push($filtered, $c);
            }
        }
        return $filtered;
    }

}
