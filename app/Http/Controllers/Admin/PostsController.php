<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('admin.pages.blog.index');
    }

    public function form()
    {
        return view('admin.pages.blog.form');
    }
}
