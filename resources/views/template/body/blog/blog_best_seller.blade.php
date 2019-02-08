<article class="col-md-4">
    <div class="widget-title">
        <i class="fa fa-thumbs-up"></i> Bestseller
    </div>
    <div class="widget-block wow fadeInUp" data-wow-duration="1s">
        <div class="row">
            @php($count = 0)
                @foreach($productBestsell  as $product)
                @if($count < 3)
            <div class="col-md-4 col-sm-2 col-xs-3">
                <img class="img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="">
            </div>
            <div class="col-md-8  col-sm-10 col-xs-9">
                <div class="block-name">
                    <a href="{{url('product-details', ['id' => $product->id])}}" class="product-name">{{ $product->name }}</a>
                    <p class="product-price"><span>$330</span> {{ $product->price }}</p>

                </div>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                    </div>
                    <a href="#" class="review">8 Reviews</a>
                </div>
                <div style="height: 60px;overflow: hidden">
                <p class="description">{{ $product->description }}</p>
                </div>
            </div>
            @else
            @break
            @endif
            @php($count++)
            @endforeach
        </div>
    </div>
</article>
