<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Model\BlogComment;

class PostDetailController extends Controller
{
    public function detail($id)
    {
        $blogPost = Blog::findOrFail($id);
        $comments = BlogComment::where('blog_id', $id)
        ->get();

         return view('shop.pages.blog.post_detail')
         ->with('comments', $comments)
         ->with('blogPost', $blogPost);

    }
    public function allPost(){
        $blogPosts = Blog::select(['id','name', 'description','img','created_at'])
        ->orderBy('id','desc')
        ->get();
        return view('shop.pages.blog.all_post')
        ->with('blogPosts',$blogPosts);

    }
    public function saveComment(Request $request){
        $userID = request()->user()->id;

        $comments =[
            'user_id' => $userID,
            'blog_id' => \request('blog_id'),
            'name' => \request('name'),
            'email' => \request('email'),
            'subject' => \request('subject'),
            'comment' => \request('comment')
        ];

        $comment = new BlogComment($comments);
        $comment->save();

        \Session::flash('', '');
        return redirect()->back();
    }

}
