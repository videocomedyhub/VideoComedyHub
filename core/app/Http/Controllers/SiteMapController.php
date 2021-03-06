<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\VideoRepository;
use App\Repositories\TagRepository;
use App\Repositories\ChannelRepository;
use App\Repositories\PageRepository;
use App\Entities\Video;
use App\Entities\Tag;
use App\Entities\Channel;

class SiteMapController extends Controller {

    protected $max = 500;
    protected $videoRepo;
    protected $channelRepo;
    protected $postRepo;
    protected $pageRepo;
    protected $categoryRepo;
    protected $tagRepo;

    public function __construct(
    VideoRepository $video, ChannelRepository $channel, PostRepository $post, PageRepository $page, CategoryRepository $category, TagRepository $tag
    ) {
        $this->videoRepo = $video;
        $this->channelRepo = $channel;
        $this->pageRepo = $page;
        $this->postRepo = $post;
        $this->categoryRepo = $category;
        $this->tagRepo = $tag;
    }

    public function index() {
        $video = $this->videoRepo->firstMap();
        $page = $this->pageRepo->firstMap();
        $post = $this->postRepo->firstMap();

        return response()->view('sitemap.index', [
                    'video' => $video,
                    'post' => $post,
                    'page' => $page,
                ])->header('Content-Type', 'text/xml');
    }

    public function videos() {
        $videoCount = Video::count();
        $indexes = ceil($videoCount / $this->max);
        return response()->view('sitemap.videos', [
                    'index' => $indexes,
                ])->header('Content-Type', 'text/xml');
    }

    public function videoList($page) {
        $videos = Video::paginate($this->max,['*'],'page', $page);
        return response()->view('sitemap.video', [
                    'videos' => $videos,
                ])->header('Content-Type', 'text/xml');
    }

    public function channelList($page) {
        $channels = Channel::paginate($this->max,['*'],'page', $page);
        return response()->view('sitemap.channel', [
                    'channels' => $channels,
                ])->header('Content-Type', 'text/xml');
    }

    public function channels() {
        $channelCount = Channel::count();
        $indexes = ceil($channelCount / $this->max);
        return response()->view('sitemap.channels', [
                    'index' => $indexes,
                ])->header('Content-Type', 'text/xml');
    }

    public function categories() {
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

    public function tags() {
        $count = Tag::count();
        $index = ceil($count / $this->max);
        return response()->view('sitemap.tags', [
                    'index' => $index,
                ])->header('Content-Type', 'text/xml');
    }

    public function tagList($page) {
        $tags = Tag::paginate($this->max,['*'],'page', $page);
        return response()->view('sitemap.tag', [
                    'tags' => $tags,
                ])->header('Content-Type', 'text/xml');
    }

}
