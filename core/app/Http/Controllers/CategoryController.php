<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Entities\Category;

class CategoryController extends Controller {

    protected $categoryRepo;

    public function __construct(CategoryRepository $category) {
        $this->categoryRepo = $category;
    }

    public function index() {
        $data = [];
        $data['categories'] = $this->categoryRepo->paginate(20);
        $data['total'] = Category::count();
        return view('frontend.categories.list', $data);
    }

    public function single($slug) {
        /*
         * Todo: Need to change the view here such that it display 
         * CHannels in this category, then videos, but channels is better
         */
        $data = [];
        $data['category'] = $this->categoryRepo->findBySlug($slug);
        $data['videos'] = $data['category']->videos()->paginate(20);
        $data['tags'] = $data['category']->tags;
        return view('frontend.categories.item', $data);
    }

    public function featured() {
        
    }

}
