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
                                <li><a href="#">Shirts</a></li>
                                <li class="active">Lolo</li>
                            </ul>
                        </div>

                        {{-- <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s">Shirt <span>"LOLO"</span> </h1>

                        </div> --}}
         @include('shop.pages.product.product_detail_form')
         @include('shop.pages.product.product_review')





                    </div>
                    @include('shop.pages.category.category')

                </div>
            </div>
        </div>

    </section>
@endsection

