<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductReview;

class ProductReviewController extends Controller
{
    public function review(Request $request){

    }

    public function saveReviews(Request $request){
        $userID = request()->user()->id;

        $reviews =[
            'user_id' => $userID,
            'product_id' => \request('product_id'),
            'name' => \request('name'),
            'company' => \request('company'),
            'rating' => \request('rating'),
            'review' => \request('review')
        ];

        $rvw = new ProductReview($reviews);
        $rvw->save();

        \Session::flash('', '');
        return redirect()->back();
    }
}
