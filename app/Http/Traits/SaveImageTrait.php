<?php


namespace App\Http\Traits;


use Illuminate\Http\Request;

trait SaveImageTrait
{
    public function saveImage(Request $request, string $key = 'input_img'): string
    {
        $imgName = '';
        if ($request->hasFile($key)) {
            $imgName = $request->file($key)->store('img');
        }
        return $imgName;
    }
}
