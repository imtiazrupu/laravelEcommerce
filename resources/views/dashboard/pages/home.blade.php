@extends('dashboard.index')

@section('content')
    <div class="row">
        @if(session('type') == \App\User::SUPER_ADMIN)
            <div class="col-md-6">
                @include('dashboard.components.manage-admin')
                @include('dashboard.components.featured-prod-cat')
            </div>
            <div class="col-md-6">
                @include('dashboard.components.featured')
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-5">
            @include('dashboard.components.new-orders')
        </div>
        <div class="col-md-7">
            @include('dashboard.components.out-of-stock')
        </div>
    </div>
    <div class="row">
        @include('dashboard.components.sales')
    </div>

    <div class="row">
        <div class="col-md-6">
            @include('dashboard.components.new-customers')
        </div>
        <div class="col-md-6">
            @include('dashboard.components.recent-sales')
        </div>
    </div>
@stop

@section('script')

@endsection
