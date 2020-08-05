<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menus;
use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class homeController extends Controller
{
    public function index()
    {
        $news=News::all();
        $menus=Menus::orderBy('order')->get();
        View::share('menus', $menus);
        View::share('news',$news);
        return view('Front.Home.index');
    }
}
