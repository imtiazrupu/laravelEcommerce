<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OurStore;

class OurStoreController extends Controller
{
    public function ourStore(){
        $ourstores = OurStore::all();
        return view('dashboard.pages.our_store')
        ->with('ourstores', $ourstores);

    }
    public function store(Request $request)
    {
        $data = $request->all(['letter','name', 'description','description2']);

        $ourstore = new OurStore($data);
        $ourstore->save();

        \Session::flash('success', 'Our Store is successfully created');
        return redirect()->back();
    }
    public function delete($id)
    {
        OurStore::destroy($id);
        \Session::flash('success', 'Our Store is successfully deleted');
        return redirect('dashboard/our-store');
    }
    public function edit($id)
{
    $ourstore = OurStore::find($id);
    return view('dashboard.pages.edit-our-store', compact('ourstore'));
}
public function editStore($id)
{
    $ourstore = OurStore::findOrFail($id);
    $ourstore->description2 = request('description2');
    $ourstore->description = request('description');
    $ourstore->name = request('name');
    $ourstore->letter = request('letter');
    $ourstore->save();

    \Session::flash('success', 'Our Store is successfully updated');
    return redirect('dashboard/our-store');
}
}
