@extends('dashboard.index')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Create Admin</h1>
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="{{ url('create-admin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name*</label>
                            <input class="form-control" type="text" id="first_name" name="first_name">
                            @if($errors->has('first_name'))
                                <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name*</label>
                            <input class="form-control" type="text" id="last_name" name="last_name">
                            @if($errors->has('last_name'))
                                <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone*</label>
                            <input class="form-control" type="text" id="phone" name="phone">
                            @if($errors->has('phone'))
                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">email*</label>
                            <input class="form-control" type="email" id="email" name="email">
                            @if($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">password*</label>
                            <input class="form-control" type="password" id="password" name="password">
                            @if($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Create Admin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
