@extends('shop.index')

@section('body_content')
<section>
        <div class="second-page-container">
            <div class="block">
                <div class="container">
                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Checkout</span> Details</h1>
                    </div>

                    <div class="row">
                        <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="box-border block-form wow fadeInLeft" data-wow-duration="1s">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills  nav-justified">
                                    <li ><a href="#address" ><i class="fa fa-thumb-tack"></i>Billing Address</a></li>
                                    <li ><a href="#shipping" ><i class="fa fa-truck"></i>Shipping Method</a></li>
                                    <li ><a href="#payment" ><i class="fa fa-money"></i>Payment Method</a></li>
                                    <li class="active"><a href="#review" data-toggle="tab"><i class="fa fa-check"></i>Order Review</a></li>
                                </ul>
<div class="tab-content">
       
        <div class="tab-pane active" id="review">
            <br>
            <h3>Review</h3>
            <br>
            <form method="post" action="{{url('payment')}}">
                @csrf
            <div class="row">
                <div class="col-md-12">
                    <table  class="cart-table table">
                        <thead>
                            <tr>
                                <th class="card_product_image">Image</th>
                                <th class="card_product_name">Product Name</th>
                                <th class="card_product_model">Size</th>
                                <th class="card_product_quantity">Price</th>
                                <th class="card_product_price">Quantity</th>
                                <th class="card_product_total">Total</th>
                            </tr>
                        </thead>
                        <tbody >
                                <tr v-for="item in cartItems">
                                <td class="card_product_image"><a :href="'{{url('product-details/')}}/'+item.id"><img title="Product Name" alt="Product Name" :src="'{{url('storage/')}}/' + item.attributes.default_img"></a></td>
                                        <td class="card_product_name" >@{{item.name}} </td>
                                        <td class="card_product_model">@{{item.attributes.size}}</td>
                                        <td class="card_product_quantity">
                                            <input type="number" min="0" value="" v-model="item.quantity"  class="styler">
                                            &nbsp;
                                            &nbsp;<a href="#"><i class="icon-trash icon-large"></i></a>
                                            {{-- v-model="@{{item.quantity}}" --}}
                                        </td>
                                        <td class="card_product_price">RM @{{item.price}}</td>
                                        <td class="card_product_total">RM @{{item.price * item.quantity}}</i></td>
                                    </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <button  type="submit"  class="btn btn-primary"  >Pay</button>
            </div>
            </form>

        </div>
    </div>
</div>
</article>
<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<div class="block-form block-order-total box-border wow fadeInRight" data-wow-duration="1s">
    <h3><i class="fa fa-dollar"></i>Total</h3>
    <hr>
    <ul class="list-unstyled">
        <li>Sub Total: <strong>RM @{{totall}}</strong></li>
        <li>Pricing Sharge: <strong>RM 0.00</strong></li>
        <li>Promotion Discound: <strong>RM 0.00</strong></li>
        <li>VAT: <strong>RM 10.00</strong></li>
        <li><hr></li>
        <li >Total: <strong>RM @{{totall+10}}</strong></li>
    </ul>
</div>
</article>
</div>
</div>
</div>
</div>
</section>
@endsection
