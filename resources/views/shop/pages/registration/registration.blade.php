@extends('shop.index')

@section('body_content')

<section>
    <div class="second-page-container">
        <div class="block">
            <div class="container">
                <div class="header-for-light">
                    <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Login</span> or <span>Register</span></h1>
                </div>
                <div class="row">

                 @include('shop.pages.registration.login_form')
                    @include('shop.pages.registration.reg_form')





                </div>
            </div>
        </div>
    </div>
</section>

    @endsection
