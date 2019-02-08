@extends('dashboard.index')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Products</h3>
            @if(Session::has('success'))
              <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            <div class="box-body">
              <h2>{{ $products->total() }} items</h2>
              <table class="table table-hover">`
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price in RM</th>
                  <th>Button</th>
                  <th>Featured</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                @foreach($products as $product)
                  <tbody>
                  <tr>
                    <th>{{ $product->name }}</th>
                    <th><img width="80px"
                        src="{{  url('storage/'.$product->default_img) }}"
                        alt="{{ $product->name }}">
                    </th>
                    <th>{{ $product->price }}</th>
                    <th>
                      <button class="btn btn-primary btn-sm">button</button>
                    </th>
                    <td>
                        {{-- {{ ($category->featured == 1) ? 'Published' : 'Unpublished' }} --}}
                        @if($product->featured == 1)
                        Ordinary

                        @elseif($product->featured == 2)
                            speacial
                        @elseif($product->featured == 3)
                            Classic

                        @else
                           Best Sell
                        @endif

                </td>
                    <th>
                      <a href="{{ url('dashboard/edit-product', ['id' => $product->id]) }}" class="btn btn-success btn-sm"><i
                            class="fa fa-pencil-square-o"></i>
                      </a>
                    </th>
                    <th>

                            <a href="{{ url('delete-product', ['id' => $product->id]) }}" class="btn btn-danger btn-sm"><i
                                class="fa fa-trash"></i>
                          </a>
                      {{-- <form action="/delete-product/{{ $product->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-sm" type="submit"><i
                              class="fa fa-trash"></i></button>
                      </form> --}}
                    </th>
                  </tr>
                  </tbody>
                @endforeach
              </table>
              <div class="row text-center">
                {{ $products->onEachSide(6)->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
