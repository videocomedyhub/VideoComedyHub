<?php

namespace App\Listeners;

use App\Events\VideoWatched;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entities\History;
use Auth;
class WatchVideoNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  VideoWatched  $event
     * @return void
     */
    public function handle(VideoWatched $event)
    {
        if(Auth::check()){
            //todo: remove video from saved later before adding to history
            History::firstOrCreate([
                'user_id' => Auth::id(),
                'video_id' => $event->video->id,
                'status' => 1,
            ]);
        }
        $event->video->count += 1;
        $event->video->save();
    }
}
