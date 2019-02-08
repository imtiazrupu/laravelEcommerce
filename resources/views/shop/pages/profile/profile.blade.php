@extends('shop.index')

@section('body_content')
<section>
        <div class="second-page-container">

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                            <div class="block">




                                    <article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">


                                        <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                            <h3><i class="fa fa-user"></i>Personal Information</h3>
                                            <a href="{{ url('/edit-customer-profile') }}" class="btn btn-info"> Edit Profile</a>
                                            <hr>
                                        </div>
                                            <div class="form-group">
                                                <label for="first_name" class="col-sm-6 control-label">First Name:<span class="text-error"></span></label>
                                                <label for="first_name" class="col-sm-6 control-label">{{ $user->first_name }} <span class="text-error"></span></label>
                                            </div>

                                            <div class="form-group">

                                                <label for="last_name" class="col-sm-6 control-label">Last Name:<span class="text-error"></span></label>
                                                <label for="last_name" class="col-sm-6 control-label">{{ $user->last_name }}<span class="text-error"></span></label>

                                            </div>

                                            <div class="form-group">

                                                <label for="email" class="col-sm-6 control-label">E-Mail:<span class="text-error"></span></label>
                                                <label for="email" class="col-sm-6 control-label">{{ $user->email }}<span class="text-error"></span></label>

                                            </div>

                                            <div class="form-group">

                                                <label for="phone" class="col-sm-6 control-label">Phone:</label>
                                                <label for="phone" class="col-sm-6 control-label">{{ $user->phone }}</label>

                                            </div>


                                            <div class="form-group">

                                                <label class="col-sm-6 control-label">State: <span class="text-error"></span></label>
                                                <label class="col-sm-6 control-label">{{$userDetail->state}} <span class="text-error"></span></label>

                                            </div>
                                            <hr>
                                            <div class="form-group">

                                                <label for="city" class="col-sm-6 control-label">City:</label>
                                                <label for="city" class="col-sm-6 control-label">{{$userDetail->city}}</label>

                                            </div>

                                            <div class="form-group">

                                                <label for="address" class="col-sm-6 control-label">Address: <span class="text-error"></span></label>
                                                <label for="address" class="col-sm-6 control-label">{{$userDetail->address}} <span class="text-error"></span></label>

                                            </div>






                                    </article>
                          </div>
                          </div>
                          @include('shop.pages.category.category')
                        </div>
                      </div>
                     </div>
@endsection
