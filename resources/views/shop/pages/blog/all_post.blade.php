@extends('shop.index')

@section('body_content')
<section>
        <div class="second-page-container">

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                            <div class="block">




<div class="row">
@foreach ($blogPosts as $blogPost)


<article class="col-md-6 text-center">
        <div class="blog">
            <figure class="figure-hover-overlay">
                <a href="#"  class="figure-href"></a>

                <i class="fa fa-comment"></i><a href="#" class="blog-link"> 4 </a>
            <img class="img-responsive" src="{{url('storage/' .$blogPost->img)}}" alt="" title="">

                <span class="bar"></span>
            </figure>
            <div class="blog-caption">
            <h3><a href="{{url('post-details',['id' => $blogPost->id])}}" class="blog-name">{{$blogPost->name}}</a></h3>
                <p class="post-information">
                    <span><i class="fa fa-user"></i> By Admin</span>
                    <span><i class="fa fa-clock-o"></i>  {{$blogPost->created_at}}</span>
                </p>
                <div style="height: 60px;overflow: hidden">
                <p>
                        {{$blogPost->description}}
                </p>
                </div>
                <a href="{{url('post-details',['id' => $blogPost->id])}}" class="btn-read">Read more</a>
            </div>
        </div>
    </article>
        @endforeach

    </div>
</div>


       </div>
   </div>
</div>
</div>

</section>

@endsection
