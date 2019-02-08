@extends('shop.index')

@section('body_content')

    <section>
       @include('template.body.slide')
    </section>

    <section>
       @include('template.body.second_menu')
    </section>

    <section>
  @include('template.body.arrivals')
    </section>


    <section>
      @include('template.body.best_seller')
    </section>

    <section id="sale-section">
        @include('template.body.selection')
    </section>

    <section>
      @include('template.body.blog.blog')
    </section>
    <section class="block-chess-banners">
     @include('template.body.new_collection')
    </section>
    {{-- <section>
       @include('template.body.catelog')
    </section> --}}
    {{-- <section class="partners">
  @include('template.body.partners')
    </section> --}}
    @endsection
