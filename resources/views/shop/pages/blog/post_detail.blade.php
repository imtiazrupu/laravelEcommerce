@extends('shop.index')

@section('body_content')

<section>
        <div class="second-page-container">

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="block-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Pages</a></li>
                                <li class="active">Blog content</li>
                            </ul>
                        </div>
                        <div class="block-blog">
                            <img src="{{url('storage/' .$blogPost->img)}}" alt="{{$blogPost->name}}" class="img-responsive blog-img">
                            <div class="block">
                                <div class="header-for-light">
                                    <h1 class="wow fadeInRight animated" data-wow-duration="1s"> <span>{{$blogPost->name}}</span></h1>
                                <p> {{$blogPost->created_at}}</p>
                                </div>
                                <p>
                                        {{$blogPost->description}}
                                </p>

                                <div class="block">
                                    <div class="header-for-light">
                                        <h4 class="wow fadeInRight animated" data-wow-duration="1s">RELATED <span>POSTS</span></h4>

                                    </div>

                          @include('shop.pages.blog.related_post')

                                    <div class="header-for-light">
                                        <h4 class="wow fadeInRight animated" data-wow-duration="1s">Clients <span>comments</span></h4>

                                    </div>
                                    @include('shop.pages.blog.clients_comments')
                                </div>




                                <div class="block-form box-border">
                                    <div class="header-for-light">
                                        <h4 class="wow fadeInRight animated" data-wow-duration="1s">Leave a <span>comment</span></h4>

                                    </div>
                                    @include('shop.pages.blog.post_comment')
                                </div>
                            </div>
                        </div>




                    </div>
         @include('shop.pages.catalog.catalog')

                </div>
            </div>
        </div>

    </section>

@endsection
