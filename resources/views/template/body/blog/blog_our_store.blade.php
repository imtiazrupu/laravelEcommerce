<article class="col-md-4">
    @foreach ($ourStore as $ourStore)
    <div class="widget-title">
        <i class="fa fa-user"></i> {{$ourStore->name}}
    </div>
    <div class="wow fadeInUp" data-wow-duration="1s">
        <p>
            <span class="dropcap">{{$ourStore->letter}}</span>{{$ourStore->description}}
        </p>
        <blockquote>
                {{$ourStore->description2}}
        </blockquote>
    </div>
@endforeach
</article>
