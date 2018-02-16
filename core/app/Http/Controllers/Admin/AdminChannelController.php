<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ChannelRepository;
use App\Entities\Category;
use App\Entities\Channel;
use App\Entities\Categoriable;
use App\Jobs\ImportSingleChannel;
use App\Jobs\ImportSearchedChannels;
use App\Jobs\ImportChannelVideos;
use Carbon\Carbon;
use Redirect;

class AdminChannelController extends Controller {

    protected $channelRepo;

    public function __construct(ChannelRepository $channel) {
        $this->channelRepo = $channel;
    }

    public function index(Request $request) {
        $channels = $this->channelRepo->getAllAdmin();
        $data = [
            'title' => 'Channels',
            'channels' => $channels,
        ];
        return view('backend.channels.index', $data);
    }

    public function newChannel() {
        $categories = Category::all(['id', 'title']);

        $data = [
            'title' => 'Add New Channnel',
            'categories' => $categories,
        ];
        return view('backend.channels.new', $data);
    }

    public function postNew(Request $request) {
        $mode = $request->input('mode');
        if ($mode === 'single') {
            if (!empty($request->input('channel'))) { // do more validation here, and for each items
                $this->processSingle($request);
                return Redirect::route('admin.channels')->with(array('note' => 'New Channel Successfully Added to Queue!', 'note_type' => 'success'));
            } else {
                return Redirect::route('admin.channels')->with(array('note' => 'No channel URL entered!', 'note_type' => 'error'));
            }
        } else {
            $this->processSearch($request);
            return Redirect::route('admin.channels')->with(array('note' => 'New Channels Successfully Added to Queue!', 'note_type' => 'success'));
        }
    }

    public function grabVideos(Request $request) {
        $channelId = $request->input('channelId');
        $cid = $request->input('cid');
        $cat = Categoriable::where('categoriable_type', '=', Channel::class)
                        ->where('categoriable_id', '=', $cid)->first();
        $cat = empty($cat) ? 1 : $cat->category_id;

        // start importing the channel videos
        ImportChannelVideos::dispatch(['channel' => $channelId, 'category' => $cat]);
        $channel = Channel::find($cid);
        // update last updated
        $date = new Carbon();
        $channel->last_fetched = $date->toDateTimeString();
        $channel->save();

        return Redirect::route('admin.channels')->with(array('note' => 'Channel videos will be grabed!', 'note_type' => 'success'));
    }

    protected function processSingle(Request $request) {
        ImportSingleChannel::dispatch($request);
    }

    protected function processSearch(Request $request) {
        ImportSearchedChannels::dispatch($request);
    }
}
