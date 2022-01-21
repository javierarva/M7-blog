<?php

namespace App\Http\Controllers;

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;

class IndexController extends Controller {
    function index() {
        $title = 'Wilkommen auf dem mond';
        return view('index',['title'=>$title]);
    }
}