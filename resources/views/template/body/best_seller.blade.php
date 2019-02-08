<div class="block color-scheme-2">
    <div class="container">
        <div class="header-for-light">
            <h1 class="wow fadeInRight animated" data-wow-duration="1s">OUR  <span>Bestseller</span></h1>

            <div class="toolbar-for-light" id="nav-bestseller">
                <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <div id="owl-bestseller"  class="owl-carousel">
            @foreach($productBestsell as $product)
              {{-- @if(isset($productCategories)) --}}
                {{-- @foreach($productCategories as $category) --}}
                {{-- @foreach($category->bestSell as $product) --}}
            <div class="text-center item">
                <article class="product light">
                    <figure class="figure-hover-overlay">
                        <a href="{{url('product-details', ['id' => $product->id])}}"  class="figure-href"></a>
                        <div class="product-new">new</div>
                        <div class="product-sale">11% <br> off</div>
                        <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                        <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>

                        <img class="img-overlay img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="">
                        <img class="img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="">
                   {{-- @foreach ($product->productImages as $img)
                        <img class="img-responsive" src="{{ url('storage/' .$img->img) }}" alt="" title="">
                    @endforeach --}}
                    </figure>
                    <div class="product-caption">
                        <div class="block-name">
                            <a href="{{url('product-details', ['id' => $product->id])}}" class="product-name">{{ $product->name }}</a>
                            <p class="product-price"><span>$330</span> {{ $product->price }}</p>

                        </div>
                        <div class="product-cart">
                            <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                        </div>
                        <div class="product-rating">
                            <div class="stars">
                                <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                            </div>
                            <a href="#" class="review">8 Reviews</a>
                        </div>
                        <div style="height: 40px;overflow: hidden">
                        <p class="description">{{ $product->description }}</p>
                        </div>
                    </div>

                </article>
            </div>
            {{-- @endforeach --}}
            @endforeach
            {{-- @endif --}}








        </div>
    </div>
</div>
