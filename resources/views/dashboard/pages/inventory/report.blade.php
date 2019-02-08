@extends('dashboard.index')

@section('content')
    <section class="content">

        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stock Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">

                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>id</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Total</th>

                            </tr>

                            @if(isset($stockIns))
                                @foreach($stockIns as $key => $stockIn)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $stockIn->product_id }}</td>
                                        <td>{{ $stockIn->product->name }}</td>
                                    <td><img style="height:100px; width:auto;" src="{{ url('storage/' . $stockIn->product->default_img ) }}" alt=""></td>
                                        <td> {{ $stockIn->total }}</td>
                                        {{-- <td>
                                            <img width="80px"
                                                 src="{{  url('storage/'.$category->img) }}"
                                                 alt="{{ $category->name }}">
                                        </td> --}}
                                        {{-- <td>
                                            <a href="{{ url('dashboard/edit-subcategory', ['id' => $category->id]) }}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete-sub-category', ['id' => $category->id]) }}"
                                               class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @endif

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script>
        var app = new Vue({
        el: '#stock',
        data: {
            entry: '',
            p_id: '',
            totall: '',
            stockURL: '{{url('get-inventory-total')}}'
        },
        methods: {
            onProductChange () {
                axios.get(this.stockURL+'/'+this.p_id).then(res => res.data)
                .then(data => {
                    console.log(data)
                    this.totall = data.total
                })
            },
            onTotalSum () {
                const total = this.totall
                const entry = this.entry
                this.totall = parseInt(total) + parseInt(entry)
            }
        }
    });
    </script>
@stop
