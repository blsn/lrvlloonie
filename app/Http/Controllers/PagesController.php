<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

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

    public function vblog(){ // api vue
        if(!Gate::allows('isAuthor')){ // roles
            abort(404, 'Sorry, not author, access denied');
        }
        
        $title = 'VBlog (API Vue)';
        return view('pages.vueblog')->with('title', $title);
    }
}
