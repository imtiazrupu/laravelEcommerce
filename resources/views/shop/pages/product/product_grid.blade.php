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
                                  <a href="{{url('product-details', ['id' => $product->id])}}" ><img class=" img-responsive" src="{{  url('storage/'.$product->default_img) }}" alt="" title="" ></a>
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
                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="product-rating">
                                        <div class="stars">

                                            {{-- <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span> --}}
                                            <?php for ($i = 5; $i >= 1; $i--) {
                                                if($i <= $rating) {
                                                    echo '<span class="star active">';
                                                } else {
                                                    echo '<span class="star ">';
                                                }
                                                }
                                                ?>
                                        </div>
                                        <a href="#" class="review"> @php($i = 0)
                                            @foreach($reviewList as $review)
                                                @php($i++)
                                            @endforeach
                                            Reviews ({{ $i }})</a>
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
         {{-- @include('shop.pages.category.category') --}}
         <aside class="col-md-3">

            <div class="main-category-block ">
                <div class="main-category-title">
                    <i class="fa fa-list"></i> Category

                </div>
            </div>
            <div class="widget-block">
                <ul class="list-unstyled ul-side-category">
                        @php($categorys = \App\Http\Controllers\admin\CategoryController::category())

                        @foreach ($categorys as $categori)



                <li><a href="#"><i class="fa fa-angle-right"></i>{{$categori->name}} / {{ \App\Http\Controllers\shop\ProductController::category_count($categori->id) }} </a>
                    <ul class="sub-category">
                            @foreach ($categori->subCategory as $subcat)
                            <li><a href="#">{{$subcat->name}} / {{ \App\Http\Controllers\shop\ProductController::subCategory_count($subcat->id) }}</a>
                                <ul class="sub-category">
                                        @foreach ($subcat->productCategories as $product_cat)
                                    <li><a href="{{ url('template-product-category',['id' => $product_cat->id]) }}">{{ $product_cat->name }} /  {{ \App\Http\Controllers\shop\ProductController::productCategory_count($product_cat->id) }}</a></li>
                                    @endforeach
                                </ul>

                            </li>
                            @endforeach
                        </ul>
                    </li>

                    @endforeach
                </ul>

            </div>
            <div class="product light last-sale">
                <figure class="figure-hover-overlay">
                    <a href="#"  class="figure-href"></a>
                    <div class="product-sale">Save <br> 7%</div>
                    <div class="product-sale-time"><p class="time"></p></div>
                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                    <img class="img-overlay img-responsive" src="{{asset('frontend/img/preview/product1.jpg')}}" alt="" title="">
                    <img class="img-responsive" src="{{asset('frontend/img/preview/product1-1.jpg')}}" alt="" title="">
                </figure>
                <div class="product-caption">
                    <div class="block-name">
                        <a href="#" class="product-name">Product name</a>
                        <p class="product-price"><span>$330</span> $320.99</p>

                    </div>
                    <div class="product-cart">
                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                    </div>
                </div>

            </div>
            <div class="widget-title">
                <i class="fa fa-money"></i> Price range

            </div>
            <div class="widget-block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" id="price-from" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" id="price-to" class="form-control" value="500">
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-title">
                <i class="fa fa-dashboard"></i> Colors

            </div>
            <div class="widget-block">
                <ul class="colors clearfix list-unstyled">
                    <li><a href="#" rel="003d71"></a></li>
                    <li><a href="#" rel="c42c39"></a></li>
                    <li><a href="#" rel="f4bc08"></a></li>
                    <li><a href="#" rel="02882c"></a></li>
                    <li><a href="#" rel="000000"></a></li>
                    <li><a href="#" rel="caccce"></a></li>
                    <li><a href="#" rel="ffffff"></a></li>
                    <li><a href="#" rel="f9e7b6"></a></li>
                    <li><a href="#" rel="ef8a07"></a></li>
                    <li><a href="#" rel="5a433f"></a></li>
                </ul>
            </div>
           @include('shop.pages.category.best_seller_side')



        </aside>

            </div>
        </div>
    </div>

</section>
    @endsection
