<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function __construct ()
    {
        $this->middleware('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::orderBy('id','DESC')->get();
        return view('admin.news.news',compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        News::create($request->all());
        return redirect('admin/news');
    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect('admin/news');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit',compact('news'));
    }

    public function update(NewsRequest $request,$id)
    {
        News::find($id)->update($request->all());
        return redirect('admin/news');
    }

}
