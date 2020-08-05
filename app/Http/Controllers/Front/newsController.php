<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class newsController extends Controller
{
  public function index()
  {
      $news=News::all();
      View::share('news',$news);
      return view('Front.News.index');
  }

  public function view($id)
  {
      $news=News::Find($id);
      View::share('news',$news);
      return view('Front.News.view');
  }
}
