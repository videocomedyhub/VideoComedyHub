<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Repositories\CategoryRepository;

class CategoryController {
    
    protected $categoryRepo;
    public function __construct(CategoryRepository $category) {
        $this->categoryRepo = $category;
    }
    
    public function index() {
        $data = [];
        $data['categories'] = $this->categoryRepo->paginate(2);
        return view('frontend.category-list', $data);
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
        return view('frontend.category-item', $data);
    }
    public function featured() {
        
    }
}
