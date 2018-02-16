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
use App\Repositories\ChannelRepository;

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

        if (strpos($this->channelId, 'youtube')) {
            $segments = explode('/', $this->channelId);
            $this->channelId = $segments[count($segments) - 1];
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ChannelRepository $channelRepo) {
        $channel = $channelRepo->existsByChannelId($this->channelId);
        if (!$channel) {
            app(ChannelHelper::class)->addNewChannel($this->channelId, $this->category);
        }
    }

}
