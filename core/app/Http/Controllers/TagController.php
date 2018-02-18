<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TagRepository;
class TagController extends Controller
{
    protected $tagRepo;


    public function __construct(TagRepository $tag) {
        $this->tagRepo = $tag;
    }
      public function single($slug) {
        $data = [];
        $data['tag'] = $this->tagRepo->findBySlug($slug);
        $data['videos'] = $data['tag']->videos()->orderByDesc('published_at')->paginate(40);
        return view('frontend.tags.item', $data);
    }
}
