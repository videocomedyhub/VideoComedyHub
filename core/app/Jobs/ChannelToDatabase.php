<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\ChannelRepository;
use Carbon\Carbon;
use App\Entities\Channel;

class ChannelToDatabase implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $channel;
    protected $category;

//    protected $tags;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $channel) {
        $this->category = $channel['category'];
        unset($channel['category']);
        $this->channel = $channel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ChannelRepository $channelRepo) {
        $channel = Channel::where('channel_id', $this->channel['channel_id'])->first();
        if ($channel) {
            return;
        } else {
            $this->channel['user_id'] = config('youtube.user', 1);
            $channel = $channelRepo->create($this->channel);
            $channel->categories()->attach($this->category);
            // start importing the channel videos keep this for now
             ImportChannelVideos::dispatch(['channel' => $channel->channel_id, 'category' => $this->category])->delay(now()->addMinutes(20));
            // update last updated
            $date = new Carbon();
            $channel->last_fetched = $date->toDateTimeString();
            $channel->save();
        }
    }

}
