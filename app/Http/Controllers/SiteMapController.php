<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\VideoRepository;
use App\Repositories\TagRepository;
use App\Repositories\ChannelRepository;
use App\Repositories\PageRepository;

class SiteMapController extends Controller {

    protected $max = 50000;
    protected $videoRepo;
    protected $channelRepo;
    protected $postRepo;
    protected $pageRepo;
    protected $categoryRepo;
    protected $tagRepo;

    public function __construct(VideoRepository $video, ChannelRepository $channel, PostRepository $post, PageRepository $page, CategoryRepository $category, TagRepository $tag) {
        $this->videoRepo = $video;
        $this->channelRepo = $channel;
        $this->pageRepo = $page;
        $this->postRepo = $post;
        $this->categoryRepo = $category;
        $this->tagRepo = $tag;
    }

    public function index() {
        $video = null;
        $page = null;
        $post = null;

        return response()->view('sitemap.index', [
                    'video' => $video,
                    'post' => $post,
                    'page' => $page,
                ])->header('Content-Type', 'text/xml');
    }

    public function videos(Request $request) {
        $videoCount = \App\Entities\Video::count();
        $indexes = $videoCount / $this->max;
        return response()->view('sitemap.videos', [
                    'index' => $indexes,
                ])->header('Content-Type', 'text/xml');
    }

    public function videoList(Request $request, $page) {
        $videos = $this->videoRepo->paginate($this->max);
        return response()->view('sitemap.video', [
                    'videos' => $videos,
                ])->header('Content-Type', 'text/xml');
    }

    public function channelList(Request $request, $page) {
        $channels = $this->channelRepo->paginate($this->max);
        return response()->view('sitemap.channel', [
                    'channels' => $channels,
                ])->header('Content-Type', 'text/xml');
    }

    public function channels(Request $request) {
        $channelCount = $this->channelRepo->model()->count();
        $indexes = $channelCount / $this->max;
        return response()->view('sitemap.channels', [
                    'index' => $indexes,
                ])->header('Content-Type', 'text/xml');
    }

    public function categories(Request $request) {
        $categories = $this->categoryRepo->all(); // change this to only fields that are needed
        return response()->view('sitemap.categories', [
                    'categories' => $categories,
                ])->header('Content-Type', 'text/xml');
    }

    public function pages() {
        $pages = $this->pageRepo->all(); // change this to only fields that are needed
        return response()->view('sitemap.pages', [
                    'pages' => $pages,
                ])->header('Content-Type', 'text/xml');
    }

    public function posts() {
        $posts = $this->postRepo->all(); // change this to only fields that are needed
        return response()->view('sitemap.posts', [
                    'posts' => $posts,
                ])->header('Content-Type', 'text/xml');
    }

    public function tags(Request $request) {
        $tags = $this->tagRepo->all(); // change this to only fields that are needed
        return response()->view('sitemap.tags', [
                    'tags' => $tags,
                ])->header('Content-Type', 'text/xml');
    }

}
