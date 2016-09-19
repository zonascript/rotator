<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::orderBy('created_at','DESC')->published()->take(10)->get();
        return view('pages.news',compact('news'));
    }


}
