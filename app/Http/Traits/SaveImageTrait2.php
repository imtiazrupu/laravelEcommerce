<?php
namespace App\Http\Traits;


use Illuminate\Http\Request;

trait SaveImageTrait2
{
    public function saveImage2(Request $request, string $key = 'input_img2'): string
    {
        $imgName = '';
        if ($request->hasFile($key)) {
            $imgName = $request->file($key)->store('img2');
        }
        return $imgName;
    }
}
