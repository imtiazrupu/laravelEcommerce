@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success" id="stock">
                    <div class="box-header with-border">
                    <h3 class="box-title">Stock Out</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        {{-- @include('dashboard.partials.errors') --}}
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('out-stock') }}" method="post" role="form"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoryId">Product ID</label>
                                        <select v-model="p_id" @change="onProductChange()" name="product_id" id="product_id" class="form-control custom-select custom-select-lg mb-3">
                                            <option selected>Select Product ID</option>
                                            @if(isset($product_id))
                                                @foreach($product_id as $product_single)
                                                    <option value="{{ $product_single->id }}">#{{ $product_single->id }} - {{ $product_single->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('product_id'))
                                            <div class="alert alert-danger">{{ $errors->first('product_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subCategoryName">Withdraw</label>
                                        <input type="text" name="withdraw" v-model="withdraw" @change.once="onTotalSum" class="form-control" id="withdraw"
                                               placeholder="Withdraw">
                                        @if($errors->has('withdraw'))
                                            <div class="alert alert-danger">{{ $errors->first('withdraw') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subCategoryName">Withdraw</label>
                                            <input type="text" name="withdraw" v-model="withdraw" class="form-control" id="withdraw"
                                                   placeholder="Withdraw Product">
                                            @if($errors->has('withdraw'))
                                                <div class="alert alert-danger">{{ $errors->first('withdraw') }}</div>
                                            @endif
                                        </div>
                                </div> --}}
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subCategoryName">Total</label>
                                            <input readonly type="text" name="total" v-model="totall" @blur="onTotalSum" class="form-control" id="total"
                                                   placeholder="Total Product">
                                            @if($errors->has('total'))
                                                <div class="alert alert-danger">{{ $errors->first('total') }}</div>
                                            @endif
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="subCategoryDesc">Remarks</label>
                                    <textarea rows="4" cols="50" name="remarks" class="form-control"
                                              id="remarks"
                                              placeholder="Description"></textarea>
                                    @if($errors->has('remarks'))
                                        <div class="alert alert-danger">{{ $errors->first('remarks') }}</div>
                                    @endif
                                </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary hundred">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stock Out</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Withdraw</th>
                                <th>Photo</th>
                                <th>Total</th>

                            </tr>

                            @if(isset($stockIns))
                                @foreach($stockIns as $key => $stockIn)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $stockIn->product_id }}</td>
                                        <td>{{ $stockIn->product->name }}</td>
                                        <td> {{ $stockIn->withdraw }}</td>
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
            withdraw: '',
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
                const withdraw = this.withdraw
                this.totall = parseInt(total) - parseInt(withdraw)
            }
        }
    });
    </script>
@stop
