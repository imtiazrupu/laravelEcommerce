<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewCollection;
use App\ClassicCollection;
use Session;
use App\Http\Traits\SaveImageTrait;
use App\Http\Traits\SaveImageTrait2;

class NewCollectionController extends Controller
{
    use SaveImageTrait;
    use SaveImageTrait2;
    public function mordernCollection(){
        $morderns = NewCollection::all();
        return view('dashboard.pages.collections.mordernCollection', compact('morderns'));
    }
    public function store(Request $request)
    {
        $data = $request->all(['name', 'description']);
        $data['img'] = $this->saveImage($request);
        $data['img2'] = $this->saveImage2($request);

        $mordern = new NewCollection($data);
        $mordern->save();

        \Session::flash('success', 'Mordern Collection is successfully created');
        return redirect()->back();
    }
    public function delete($id)
{
    NewCollection::destroy($id);
    \Session::flash('success', 'Mordern Collection is successfully deleted');
    return redirect('dashboard/mordern-collection');
}
public function edit($id)
{
    // $slide = \DB::table('slides')
    //     ->where('id', '=', $id)
    //     ->first();
    $mordern = NewCollection::find($id);
    return view('dashboard.pages.collections.edit-mordern-collection', compact('mordern'));
}
public function editStore($id)
{
    $mordern = NewCollection::findOrFail($id);
    $mordern->description = request('description');
    $mordern->name = request('name');

    if (request()->has('input_img')) {
        \Storage::delete($mordern->img);
        $mordern->img = request()->file('input_img')->store('img');
    }
    if (request()->has('input_img2')) {
        \Storage::delete($mordern->img2);
        $mordern->img2 = request()->file('input_img2')->store('img2');
    }
    $mordern->save();

    \Session::flash('success', 'Mordern Collection is successfully updated');
    return redirect('dashboard/mordern-collection');
}



public function classicCollection(){
    $classics = ClassicCollection::all();
    return view('dashboard.pages.collections.classicCollection', compact('classics'));
}
public function classicStore(Request $request)
{
    $data = $request->all(['name', 'description']);
    $data['img'] = $this->saveImage($request);
    $data['img2'] = $this->saveImage2($request);

    $classic = new classicCollection($data);
    $classic->save();

    \Session::flash('success', 'Classic Collection is successfully created');
    return redirect()->back();
}
public function classicDelete($id)
{
    classicCollection::destroy($id);
    \Session::flash('success', 'Classic Collection is successfully deleted');
    return redirect('dashboard/classic-collection');
}
public function classicEdit($id)
{
    $classic = classicCollection::find($id);
    return view('dashboard.pages.collections.edit-classic-collection', compact('classic'));
}
public function classicEditStore($id)
{
    $classic = classicCollection::findOrFail($id);
    $classic->description = request('description');
    $classic->name = request('name');

    if (request()->has('input_img')) {
        \Storage::delete($classic->img);
        $classic->img = request()->file('input_img')->store('img');
    }
    if (request()->has('input_img2')) {
        \Storage::delete($classic->img2);
        $classic->img2 = request()->file('input_img2')->store('img2');
    }
    $classic->save();

    \Session::flash('success', 'Classic Collection is successfully updated');
    return redirect('dashboard/classic-collection');
}
}
