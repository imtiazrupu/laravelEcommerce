@extends('shop.index')

@section('body_content')
<section>
        <div class="second-page-container">
            <div class="block">
                <div class="container">
                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">Shopping<span> Cart</span></h1>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="cart-table table wow fadeInLeft" data-wow-duration="1s">
                                <thead>
                                    <tr>
                                        <th class="card_product_image">Image</th>
                                        <th class="card_product_name">Product Name</th>
                                        <th class="card_product_model">Size</th>
                                        <th class="card_product_quantity">Quantity</th>
                                        <th class="card_product_price">Unit Price</th>
                                        <th class="card_product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if($cartItems)
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="card_product_image"><a href="{{url('product-details', ['id' => $item->id])}}"><img title="Product Name" alt="Product Name" src="{{url('storage/' .$item->attributes->default_img)}}"></a></td>
                                        <td class="card_product_name" >{{$item->name}}<i class="fa fa-heart pull-right"></i></a> </td>
                                        <td class="card_product_model">{{$item->attributes->size}}</td>
                                        <td class="card_product_quantity">
                                            <input id="item{{$item->id}}" type="number" min="0" value="{{$item->quantity}}" name="" class="styler">
                                            &nbsp;
                                            &nbsp;<a href="#"><i class="icon-trash icon-large"></i></a>
                                        </td>
                                        <td class="card_product_price">RM {{$item->price}}</td>
                                        <td class="card_product_total">RM {{$item->price * $item->quantity}}<a href="{{url('remove-from-cart/'.$item->id)}}" onclick = "if (! confirm('Continue?')) { return false; }"><i  class="fa fa-trash-o pull-right"></i></td>
                                    </tr>
                                    @endforeach
                                    @endif --}}
                                    <tr v-for="item in cartItems">
                                            <td class="card_product_image"><a :href="'{{url('product-details/')}}/'+item.id"><img title="Product Name" alt="Product Name" :src="'{{url('storage/')}}/' + item.attributes.default_img"></a></td>
                                            <td class="card_product_name" >@{{item.name}}<i class="fa fa-heart pull-right"></i></a> </td>
                                            <td class="card_product_model">@{{item.attributes.size}}</td>
                                            <td class="card_product_quantity">
                                                <input type="number" min="0" value="" v-model="item.quantity"  class="styler">
                                                &nbsp;
                                                &nbsp;<a href="#"><i class="icon-trash icon-large"></i></a>
                                                {{-- v-model="@{{item.quantity}}" --}}
                                            </td>
                                            <td class="card_product_price">RM @{{item.price}}</td>
                                            <td class="card_product_total">RM @{{item.price * item.quantity}}<a :href="'{{url('remove-from-cart/')}}/'+item.id" onclick="if (! confirm('Continue?')) { return false; }"><i  class="fa fa-trash-o pull-right"></i></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                       @include('shop.pages.product.check_out')
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="row">
                                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                        <h3><i class="fa fa-truck"></i> Shipping & Taxes</h3>
                                        <hr>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Your Country</label>
                                                    <select name="country" class="form-control">
                                                        <option selected="selected">Country 1</option>
                                                        <option>Country 2</option>
                                                        <option>Country 3</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Your Region</label>
                                                    <select name="Region" class="form-control">
                                                        <option selected="selected">Region 1</option>
                                                        <option>Region 2</option>
                                                        <option>Region 3</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Your Post Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="submit"  value="Get Quotes"  class="btn-default-1">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="row">
                                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                        <h3><i class="fa fa-tag"></i> Apply Discount Code</h3>
                                        <hr>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Discount Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="submit"  value="Apply Coupon"  class="btn-default-1">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </article>
                                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                        <h3><i class="fa fa-gift"></i> Use Gift Voucher</h3>
                                        <hr>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Voucher Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="submit"  value="Apply Voucher"  class="btn-default-1">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="row">

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
