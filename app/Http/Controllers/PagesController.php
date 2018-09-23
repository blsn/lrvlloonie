<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Homepage';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title'     => 'Services',
            'services'  => ['Web design', 'Programing', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    // api vue
    public function vblog(){
        $title = 'Blog (API Vue)';
        return view('pages.vueblog')->with('title', $title);
    }
}
