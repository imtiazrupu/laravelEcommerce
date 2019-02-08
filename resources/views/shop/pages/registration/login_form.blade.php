<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
        <h3><i class="fa fa-unlock"></i>Login</h3>
        <p>Please login using your existing account</p>
        <form action="{{url('customer-login')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="log_email" name="email" class="form-control" placeholder="Username">
                </div>
                <div class="col-md-6">
                    <input type="password" name="password" id="log_pass" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-12">
                    <hr>
                    <input type="submit"  value="Login"  class="btn-default-1">
                    <input type="reset" value="Reset password" class="btn-default-1">
                </div>
            </div>
        </form>
    </div>
</article>
