<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Entities\Category;
use \Validator;
use \Redirect;

class AdminCategoryController extends Controller {

    protected $categoryRepo;

    public function __construct(CategoryRepository $repository) {
        $this->categoryRepo = $repository;
    }

    public function index() {
        $cats = $this->categoryRepo->getAllAdmin();

        $data = [
            'title' => 'Categories',
            'categories' => $cats,
        ];
        return view('backend.categories.index', $data);
    }
    
    public function newCategory() {
        $data = [
            'title' => 'New Category',
        ];
        return view('backend.categories.new', $data);
    }
    
    public function store(Request $request) {
        $validator = Validator::make($data = $request->input(), Category::$rules);
        
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $data['image'] = 'http://placehold.it/400x300';
        $this->categoryRepo->create($data);
        
        return Redirect::route('admin.categories')->with(array('note' => 'New Category Successfully Added!', 'note_type' => 'success'));
    }

}
