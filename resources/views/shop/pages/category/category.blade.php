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


            <li><a href="#"><i class="fa fa-angle-right"></i>{{$categori->name}} / {{ \App\Http\Controllers\shop\ProductController::category_count($categori->id) }}</a>
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
