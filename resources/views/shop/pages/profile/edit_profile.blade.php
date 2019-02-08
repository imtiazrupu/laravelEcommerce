@extends('shop.index')

@section('body_content')
<section>
        <div class="second-page-container">

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                            <div class="block">

                                <article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                    @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif


                                <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                    <h3><i class="fa fa-user"></i>Personal Information</h3>
                                    <hr>
                                </div>
                                    <form name="updateForm" class="form-horizontal" role="form" method="post" action="{{url('update-customer-profile')}}">
                                            @csrf
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-3 control-label">First Name:<span class="text-error"></span></label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}">
                                            </div>
                                            @if($errors->has('first_name'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="form-group">

                                            <label for="last_name" class="col-sm-3 control-label">Last Name:<span class="text-error"></span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}">
                                            </div>
                                            @if($errors->has('last_name'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="form-group">

                                            <label for="email" class="col-sm-3 control-label">E-Mail:<span class="text-error"></span></label>
                                            <div class="col-sm-9 ">
                                                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
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
                                                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}" disabled>
                                            </div>
                                            @if($errors->has('phone'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                        </div>

                                        <div class="form-group">

                                            <label class="col-sm-3 control-label">State: <span class="text-error"></span></label>
                                            <div class="col-sm-9">
                                                <select name="state" class="form-control">

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
                                                <input type="text" class="form-control" name="city" id="city" value="{{$userDetail->city}}">
                                            </div>
                                            @if($errors->has('city'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('city') }}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="form-group">

                                            <label for="address" class="col-sm-3 control-label">Address: <span class="text-error"></span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="address" id="address" value="{{$userDetail->address}}">
                                            </div>
                                            @if($errors->has('address'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button style="color:black" type="submit" class="btn btn ">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <script type="text/javascript">

                                        document.forms['updateForm'].elements['state'].value="{{ $userDetail->state }}"

                                               </script>



                            </article>

                          </div>
                          </div>
                          @include('shop.pages.category.category')
                        </div>
                      </div>
                     </div>
@endsection
