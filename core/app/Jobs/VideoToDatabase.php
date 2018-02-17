<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\VideoRepository;
use App\Repositories\ChannelRepository;
use App\Repositories\TagRepository;
use App\Helpers\ChannelHelper;
use App\Entities\Video;

class VideoToDatabase implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $video;
    protected $category;
    protected $tags;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $video) {
        $this->category = $video['category'];
        $this->tags = $video['tags'];
        unset($video['tags']);
        unset($video['category']);
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(VideoRepository $videoRepo, ChannelRepository $channelRepo, TagRepository $tagRepo) {

        try {
            // check if video exist
            $v = Video::where('video_id', '=', $this->video['video_id'])->first();
            if ($v) {
                echo "video exists \n";
                return;
            } else {
                $channel = $channelRepo->existsByChannelId($this->video['channel_id']);
                if (!$channel) {
                    $channel = app(ChannelHelper::class)->addNewChannel($this->video['channel_id'], $this->category);
                }
                $this->video['channel_id'] = $channel->id;
                $video = $videoRepo->create($this->video);
                $video->categories()->attach($this->category);

                // add tags to the database if not exist
                $tags = $tagRepo->addTags($this->tags);
                // add the tags to the video
                $videoRepo->addTagsToVideo($video, $tags);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
