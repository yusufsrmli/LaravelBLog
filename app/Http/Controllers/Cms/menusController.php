<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Menus;
use App\Models\SubMenus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class menusController extends Controller
{

    public function index()
    {
        $menus= Menus::all();
        View::share('menus', $menus);
        return view('CMS.menu.list');

    }

    public function create()
    {
        return view('CMS.menu.create');
    }

    public function create_post(Request $request)
    {
        $menus= new Menus();
        $menus->title=$request->input('title');
        $menus->content=$request->input('content');
        $menus->order=$request->input('order');

        $menus-> save();

        return redirect()->route('CMS.menus.create');
    }

    public function createSub()
    {
        $menus=Menus::all();
        View::share('menus',$menus);
        return view('CMS.menu.createsub');
    }

    public function createSub_post(Request $request)
    {
        $submenus= new SubMenus();
        $submenus->menu_id=$request->input('menu_id');
        $submenus->title=$request->input('title');
        $submenus->content=$request->input('content');
        $submenus->order=$request->input('order');

        $submenus->save();

        return redirect()->route('CMS.menus.createsub');
    }

    public function remove($id)
    {
        Menus::find($id)->delete();
        SubMenus::where('menu_id',$id)->delete();
        return redirect()->route('CMS.menus.list');
    }

    public function remove_subs($id)
    {
        SubMenus::find($id)->delete();

        return redirect()->route('CMS.menus.list');

    }

    public function edit($id)
    {
        $menus= Menus::find($id);
        View::share('menus',$menus);
        return view('CMS.menu.edit');
    }
    public function edit_post($id , Request $request)
    {
        $menus = Menus::find($id);
        $menus-> title = $request -> input('title');
        $menus-> content = $request -> input('content');
        $menus-> order = $request -> input('order');

        $menus->save();

        return redirect() ->route('CMS.menus.list');
    }

    public function editSubs($id)
    {
        $menus= Menus::all();
        $subs=SubMenus::find($id);
        View::share('menus',$menus);
        View::share('subs',$subs);

        return view('CMS.menu.editsub');
    }

    public function editSubs_post($id, Request $request)
    {
        $subs = SubMenus::find($id);
        $subs -> menu_id = $request->input('menu_id');
        $subs -> title = $request->input('title');
        $subs -> content = $request->input('content');
        $subs -> order = $request->input('order');

        $subs->save();

        return redirect()->route('CMS.menus.list');
    }

}
