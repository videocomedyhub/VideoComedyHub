<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ChannelRepository;
use App\Entities\Channel;

class ChannelController extends Controller
{
    protected $channelRepo;

    public function __construct(ChannelRepository $channel) {
        $this->channelRepo = $channel;
    }
    public function index()
    {
        $data = [];
        $data['channels'] = $this->channelRepo->paginate(20);
        $data['total'] = Channel::count();
       return view('frontend.channels.list', $data);
    }
    
    public function single($slug) {
        $data = [];
        $data['channel'] = $this->channelRepo->findBySlug($slug);
        $data['videos'] = $data['channel']->videos()->orderByDesc('published_at')->paginate(40);
        $data['tags'] = $data['channel']->tags;
        return view('frontend.channels.item', $data);
    }
    
    public function singleById($channelId) {
        
    }

}
