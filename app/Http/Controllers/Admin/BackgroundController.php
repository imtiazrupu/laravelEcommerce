<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BackgroundPhoto;
use App\Http\Traits\SaveImageTrait;

class BackgroundController extends Controller
{
    use SaveImageTrait;
    public function backgroundPhoto(){
        return view('dashboard.pages.collections.background_photo');
    }

    public function store(Request $request)
    {
        $data['img'] = $this->saveImage($request);

        $backgroundPhoto = new BackgroundPhoto($data);
        $backgroundPhoto->save();

        \Session::flash('success', 'Background Photo is successfully Added');
        return redirect()->back();
    }
}
