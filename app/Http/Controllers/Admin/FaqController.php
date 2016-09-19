<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    function __construct ()
    {
        $this->middleware('login');
    }

    public function index()
    {
        $faq = Faq::all();
        return view('admin.faq.faq',compact('faq'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(FaqRequest $request)
    {
        Faq::create($request->all());
        return redirect('admin/faq');
    }

    public function destroy($id)
    {
        Faq::destroy($id);
        return redirect('admin/faq');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit',compact('faq'));
    }

    public function update(FaqRequest $request,$id)
    {
        Faq::find($id)->update($request->all());
        return redirect('admin/faq');
    }
}
