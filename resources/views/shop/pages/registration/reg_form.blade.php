
<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{url('customer-register')}}" method="post">
        @csrf();
    <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
        <h3><i class="fa fa-user"></i>Personal Information</h3>
        <hr>
        <form class="form-horizontal" role="form" method="post" action="#">
            <div class="form-group">
                <label for="first_name" class="col-sm-3 control-label">First Name:<span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_name" id="first_name">
                </div>
                @if($errors->has('first_name'))
                <div class="alert alert-danger">
                    {{ $errors->first('first_name') }}
                </div>
            @endif
            </div>
            <div class="form-group">

                <label for="last_name" class="col-sm-3 control-label">Last Name:<span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="last_name" id="last_name">
                </div>
                @if($errors->has('last_name'))
                <div class="alert alert-danger">
                    {{ $errors->first('last_name') }}
                </div>
            @endif
            </div>
            <div class="form-group">

                <label for="email" class="col-sm-3 control-label">E-Mail:<span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                @if($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
            </div>
            <div class="form-group">

                <label for="phone" class="col-sm-3 control-label">Phone:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                @if($errors->has('phone'))
                <div class="alert alert-danger">
                    {{ $errors->first('phone') }}
                </div>
            @endif
            </div>

            <h3><i class="fa fa-truck"></i>Delivery Information</h3>
            <hr>
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

                <label for="city" class="col-sm-3 control-label">City:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" id="city">
                </div>
                @if($errors->has('city'))
                <div class="alert alert-danger">
                    {{ $errors->first('city') }}
                </div>
            @endif
            </div>
            <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Address: <span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                @if($errors->has('address'))
                <div class="alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
            @endif
            </div>


            <h3><i class="fa fa-lock"></i>Password</h3>
            <hr>
            <div class="form-group">

                <label for="password" class="col-sm-3 control-label">Password: <span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                @if($errors->has('password'))
                <div class="alert alert-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
            </div>
            <div class="form-group">

                <label for="c_password" class="col-sm-3 control-label">Re-Password: <span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="c_password" id="c_password">
                </div>
                @if($errors->has('c_password'))
                <div class="alert alert-danger">
                    {{ $errors->first('c_password') }}
                </div>
            @endif
            </div>
            <div class="form-group">
                <label for="newsletter" class="col-sm-3 control-label">Newsletter: <span class="text-error">*</span></label>
                <div class="col-sm-9">
                    <div class="radio">
                        <label>
                            <input type="radio" name="newsletter" id="newsletter1" value="1" checked>
                            Subscribe
                        </label>

                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="newsletter" id="newsletter2" value="0">
                            Unsubscribe
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">  I'v read and agreed on <a href="#">Condations</a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn-default-1">Register</button>
                </div>
            </div>
        </form>

    </div>
    </form>
</article>
