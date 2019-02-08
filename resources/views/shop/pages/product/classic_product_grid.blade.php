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
                            <li class="active">Products grid</li>
                        </ul>
                    </div>

                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">Short <span>dresses</span></h1>

                    </div>
                    <div class="block-products-modes color-scheme-2">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="product-view-mode">
                                    <a href="{{url('product-grid')}}" class="active"><i class="fa fa-th-large"></i></a>
                                    <a href="{{url('product-list')}}"><i class="fa fa-th-list"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <label class="pull-right">Sort by</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="sort-type" class="form-control">
                                            <option value="position:asc">--</option>
                                            <option value="price:asc"  selected="selected">Price: Lowest first</option>
                                            <option value="price:desc">Price: Highest first</option>
                                            <option value="name:asc">Product Name: A to Z</option>
                                            <option value="name:desc">Product Name: Z to A</option>
                                            <option value="quantity:desc">In stock</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="products-per-page" class="form-control">
                                            <option value="10" selected="selected">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="100">100</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            @foreach($products as $product)

                        <div class="col-xs-12 col-sm-6 col-md-4 text-center mb-25">

                            <article class="product light">

                                <figure class="figure-hover-overlay">
                                    <a href="{{url('product-details', ['id' => $product->id])}}"  class="figure-href"></a>
                                    <div class="product-new">new</div>
                                    <div class="product-sale">7% <br> off</div>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img  class=" img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="" >
                                    {{-- @foreach ($product->productImages as $img)
                                    <img class="img-responsive" src=" {{ url('storage/'.$img->img) }}" alt="" title="">
                                    @endforeach --}}
                                </figure>
                                {{-- {{  url('storage/'.$product->productImages->img) }} --}}

                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="{{url('product-details', ['id' => $product->id])}}" class="product-name">{{ $product->name}}</a>
                                        <p class="product-price"><span>$330</span> {{ $product->price}}</p>

                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    <div class="product-rating">
                                        <div class="stars">
                                            <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                        </div>
                                        <a href="#" class="review">8 Reviews</a>
                                    </div>
                                    <div style="height: 40px;overflow: hidden">
                                    <p class="description">{{ $product->description}}</p>
                                    </div>
                                </div>

                            </article>


                        </div>
                        @endforeach
                    </div>

                </div>
               @include('shop.pages.category.category')

            </div>
        </div>
    </div>

</section>
    @endsection
