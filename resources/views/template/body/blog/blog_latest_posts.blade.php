<article class="col-md-4">
    <div class="widget-title">
    <i class="fa fa-comments"></i> <a  onMouseOver="this.style.color='black'"
    onMouseOut="this.style.color=''"
    style=" text-decoration: none;" href="{{url('all-post')}}">Latest Posts</a>
    </div>
    <div class="widget-block wow fadeInUp" data-wow-duration="1s">
        <div class="row">
            @php ($count = 0)
        @foreach ($blogPosts as $blogPost)
        @if($count < 4)
        <div class="col-md-4  col-sm-2 col-xs-4">
        <img class="img-responsive" src="{{url('storage/' .$blogPost->img)}}" alt="" title="">
        </div>
        <div class="col-md-8  col-sm-10 col-xs-8">
        <div class="block-name">
        <a href="{{url('post-details',['id' => $blogPost->id])}}" class="product-name">{{$blogPost->name}}</a>
        </div>
        <div style="height: 60px;overflow: hidden">
        <p class="description">{{$blogPost->description}}</p>

        </div>
        <a style="background-color:#eb2c33; color:black;" href="{{url('post-details',['id' => $blogPost->id])}}" class="btn btn-brand">Read More</a>
        {{-- <a  href="#" class="btn-read">Read more</a> --}}
    </div>
        @else
        @break
        @endif
        @php($count++)
        @endforeach


        </div>
    </div>
</article>
