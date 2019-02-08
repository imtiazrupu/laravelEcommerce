<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Traits\SaveImageTrait;
use App\Blog;
use Illuminate\Http\Request;
use Auth, Session;


class BlogController extends Controller
{ use SaveImageTrait;
    public function blogs()
    {

        return view('dashboard.pages.blog.blogs');
    }
    public function blogPost(){

$blogPosts = Blog::all();
        return view('dashboard.pages.blog.blog_post', compact('blogPosts'));
    }

    public function store(Request $request){
    $data = $request->all(['name','description']);
    $data['img'] =$this->saveImage($request);

    $blogPost = new Blog($data);
    $blogPost->save();
    \Session::flash('success', 'Blog Post Added Successfully');
    return redirect()->back();
    }

    public function edit($id)
{
    $blogPost = Blog::find($id);
    return view('dashboard.pages.blog.edit_blog_post', compact('blogPost'));
}
public function editStore($id)
{
    $blogPost = Blog::findOrFail($id);
    $blogPost->name = request('name');
    $blogPost->description = request('description');


    if (request()->has('img')) {
        \Storage::delete($blogPost->img);
        $blogPost->img = request()->file('img')->store('img');
    }
    $blogPost->save();

    \Session::flash('success', 'Blog Post is successfully updated');
    return redirect('dashboard/blog-post');
}
public function delete($id)
{
    Blog::destroy($id);
    \Session::flash('success', 'Blog Post is successfully deleted');
    return redirect('dashboard/blog-post');
}
}
