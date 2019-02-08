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
                                    <li ><a href="#shipping"  ><i class="fa fa-truck"></i>Shipping Method</a></li>
                                    <li class="active"><a href="#payment" data-toggle="tab"><i class="fa fa-money"></i>Payment Method</a></li>
                                    <li ><a href="#review" ><i class="fa fa-check"></i>Order Review</a></li>
                                </ul>
<div class="tab-content">

        <div class="tab-pane active" id="payment">
            <br>
        <form method="post" action="{{url('review')}}">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <h3>Cash On Delivery</h3>
                    <hr>
                    <p>
                        You can give your payment when you get the product.
                    </p>
                    <div class="radio">
                        <label class="color-active">
                            <input type="radio" name="payment" id="payment1" value="0">
                            Cash On Delivery
                        </label>
                        @if($errors->has('first_name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('payment') }}
                        </div>
                    @endif
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <h3>Visa Card</h3>
                    <hr>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                    </p>
                    <div class="radio">
                        <label class="color-active">
                            <input type="radio" name="payment" id="payment2" value="1">
                            Visa Card
                        </label>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4">
                    <h3>Stripe</h3>
                    <hr>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                    </p>
                    <div class="radio">
                        <label class="color-active">
                            <input type="radio" name="payment" id="payment3" value="2">
                            Stripe
                        </label>
                    </div>
                </div> --}}
                <hr>
                <a href="#" class="btn-default-1">Back</a>
                <button  type="submit"  class="btn btn-primary"  >Next</button>
            </form>
            </div>

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
