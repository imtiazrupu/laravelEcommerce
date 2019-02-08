<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\slide;
use Session;
use App\Http\Traits\SaveImageTrait;

class SlideController extends Controller
{   use SaveImageTrait;
    public function slide(){
        $slides = Slide::all();
        return view('dashboard.pages.slide', compact('slides'));
    }
    public function store(Request $request)
{
    $data = $request->all(['button_one', 'button_two','text_one','text_two','text_three']);
    $data['img'] = $this->saveImage($request);

    $slide = new Slide($data);
    $slide->save();

    \Session::flash('success', 'Slide is successfully created');
    return redirect()->back();
}
public function delete($id)
{
    Slide::destroy($id);
    \Session::flash('success', 'Slide is successfully deleted');
    return redirect('dashboard/slide');
}
public function edit($id)
{
    // $slide = \DB::table('slides')
    //     ->where('id', '=', $id)
    //     ->first();
    $slide = Slide::find($id);
    return view('dashboard.pages.edit-slide', compact('slide'));
}
public function editStore($id)
{
    $slide = Slide::findOrFail($id);
    $slide->button_one = request('button_one');
    $slide->button_two = request('button_two');
    $slide->text_one = request('text_one');
    $slide->text_two = request('text_two');
    $slide->text_three = request('text_three');

    if (request()->has('img')) {
        \Storage::delete($slide->img);
        $slide->img = request()->file('img')->store('img');
    }
    $slide->save();

    \Session::flash('success', 'Slide is successfully updated');
    return redirect('dashboard/slide');
}
}

