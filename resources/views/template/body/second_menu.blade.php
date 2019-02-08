<div class="home-category color-scheme-2">
    <div class="container">
        <div class="row">
                @php($categorys = \App\Http\Controllers\admin\CategoryController::category())
                @foreach ($categorys as $categori)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="home-category-block">
                    <div class="home-category-title">
                        <i class="fa fa-male"></i> <a  style="cursor:pointer;">{{ $categori->name }}</a>
                    </div>
                    <div class="home-category-option">
                        <ul class="list-unstyled home-category-list">


                                @foreach ($categori->subCategory as $subcat)
                                @foreach ($subcat->productCategories as $product_cat)
                            <li><a href="{{ url('template-product-category',['id' => $product_cat->id]) }}"><i class="fa fa-check"></i> {{ $product_cat->name }}</a></li>
                            @endforeach
                            @endforeach
                        </ul>
                        <img src="{{ url('storage/'.$categori->img) }}" class="img-responsive" alt="">
                    </div>
                </article>

            </div>

            @endforeach

        </div>
    </div>
</div>
