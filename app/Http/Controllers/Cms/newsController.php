<?php

namespace App\Http\Controllers\Cms;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;



class newsController extends Controller
{
    public function index()
    {
        $news = News::all();
        View::share('news', $news);
        return view('CMS.news.list');
    }

    public function create()
    {
        return view('CMS.news.create');
    }

    public function create_post(Request $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path() . '/images/news', $file->getClientOriginalName());
            $news->img_url = $file->getClientOriginalName();
        }

        $news->save();

        return redirect()->route('CMS.news.create');

    }

    public function remove($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('CMS.news.list');
    }

    public function edit($id)
    {
        $news = News::find($id);
        View::share('news', $news);
        return view('CMS.news.edit');
    }

    public function edit_post($id, Request $request)
    {
        $news = News::find($id);
        if ($request->hasFile('image')) {
            $image_path = public_path() . '/images/news/' . $news->img_url;
            unlink($image_path);
            $file = $request->file('image');
            $file->move(public_path() . '/images/news', $file->getClientOriginalName());
            $news->img_url = $file->getClientOriginalName();
        }
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->save();

        return redirect()->route('CMS.news.list');
    }



}
