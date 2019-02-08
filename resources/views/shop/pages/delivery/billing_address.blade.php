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
                                    <li class="active"><a href="#address" data-toggle="tab"><i class="fa fa-thumb-tack"></i>Billing Address</a></li>
                                    <li><a href="#shipping"  class="disabled"><i class="fa fa-truck"></i>Shipping Method</a></li>
                                    <li><a href="#payment" ><i class="fa fa-money"></i>Payment Method</a></li>
                                    <li ><a href="#review" ><i class="fa fa-check"></i>Order Review</a></li>
                                </ul>
<div class="tab-content">
        <div class="tab-pane active" id="address">
            <br>
            <h3>Account & Billing Details</h3>
            <hr>
        <form role="form" method="post" action="{{url('shipping')}}">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputFirstName" class="control-label">First Name:<span class="text-error">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name">
                            </div>
                            @if($errors->has('first_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="inputLastName" class="control-label">Last Name:<span class="text-error">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="inputLastName" name="last_name">
                            </div>
                            @if($errors->has('last_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="inputEMail" class="control-label">E-Mail:<span class="text-error">*</span></label>
                            <div>
                                <input type="email" class="form-control" id="inputEMail" name="email">
                            </div>
                            @if($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="control-label">Phone:</label>
                            <div>
                                <input type="text" class="form-control" id="inputPhone" name="phone">
                            </div>
                            @if($errors->has('phone'))
                            <div class="alert alert-danger">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCompany" class="control-label">Company:</label>
                            <div>
                                <input type="text" class="form-control" id="inputCompany" name="company">
                            </div>
                            @if($errors->has('company'))
                            <div class="alert alert-danger">
                                {{ $errors->first('company') }}
                            </div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="inputAdress1" class="control-label">Address /1: <span class="text-error">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="inputAdress1" name="address">
                            </div>
                            @if($errors->has('address'))
                            <div class="alert alert-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        </div>
                        <div class="form-group">

                                <label class="col-sm-3 control-label">State: <span class="text-error">*</span></label>
                                <div class="col-sm-9">
                                    <select name="state" class="form-control">
                                        <option value="">-All State-</option>
                                        <option value="State1">State1</option>
                                        <option value="State2">State2</option>
                                    </select>
                                      @if($errors->has('state'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('state') }}
                                    </div>
                                @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="inputCity" class="control-label">City: <span class="text-error">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="inputCity" name="city">
                            </div>
                            @if($errors->has('city'))
                            <div class="alert alert-danger">
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="inputPostCode" class="control-label">Post Code: <span class="text-error">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="inputPostCode" name="post_code">
                            </div>
                            @if($errors->has('post_code'))
                            <div class="alert alert-danger">
                                {{ $errors->first('post_code') }}
                            </div>
                        @endif
                        </div>

                    </div>
                </div>
                <hr>
                <a href="#" class="btn-default-1">Back</a>
                <button  type="submit"  class="btn btn-primary"  >Next</button>


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
