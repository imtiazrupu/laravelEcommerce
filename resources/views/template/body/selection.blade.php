<div class="block color-scheme-white-90">
    <div class="container">
        <div class="header-for-light hidden-xs hidden-sm">
            <h1 class="wow fadeInRight animated" data-wow-duration="1s">OUR <span>SPECIAL SELECTION</span></h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="title-block light wow fadeInLeft">

                    <h2>Summer sale collection</h2>
                    <h1>Effect</h1>
                    <p>Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla auctor fringilla. </p>
                    <div class="text-center">
                        <div class="toolbar-for-light" id="nav-summer-sale">
                            <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div id="owl-summer-sale"  class="owl-carousel">
                    @foreach($productspecial as $product)
                    <div class="text-center">
                        <article class="product light wow fadeInUp">
                            <figure class="figure-hover-overlay">
                                <a href="{{url('product-details', ['id' => $product->id])}}"  class="figure-href"></a>
                                <div class="product-new">new</div>
                                <div class="product-sale">11% <br>off</div>
                                <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                <img class="img-overlay img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="">
                                <img class="img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="">
                            </figure>
                            <div class="product-caption">
                                <div class="block-name">
                                    <a href="{{url('product-details', ['id' => $product->id])}}" class="product-name">{{ $product->name }}</a>
                                    <p class="product-price"><span>$330</span> $ {{ $product->price }}</p>
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
                                <div class="product-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                </div>
                            </div>

                        </article>
                    </div>

                    @endforeach


                </div>
            </div>
        </div>

    </div>
</div>
