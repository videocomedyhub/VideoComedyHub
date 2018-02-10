<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ChannelRepository;

class AdminChannelController extends Controller
{
    protected $channelRepo;
    public function __construct(ChannelRepository $channel) {
        $this->channelRepo = $channel;
    }
    
    
    public function index(Request $request) {
        
    }
}
