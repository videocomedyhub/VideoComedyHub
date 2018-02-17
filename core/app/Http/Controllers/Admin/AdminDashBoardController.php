<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashBoardController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data = [
            'title' => 'DashBoard',
        ];
        return view('backend.dashboard.index', $data);
    }

}
