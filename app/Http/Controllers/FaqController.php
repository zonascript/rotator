<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function getFaq()
    {
        $faq = Faq::all();
        return view('pages.faq',compact('faq'));
    }
}
