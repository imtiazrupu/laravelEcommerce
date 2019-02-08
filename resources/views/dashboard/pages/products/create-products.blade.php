@extends('dashboard.index')

@section('title')
    Create Product
@stop

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Product</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('create-product') }}" method="post" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Main Category</label>
                                        <select name="category_id" id="category"
                                                class="form-control custom-select custom-select-lg mb-3">
                                            <option selected>Select category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_id'))
                                            <div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="subCategory">Sub Category</label>
                                        <select name="sub_category_id" id="subCategory"
                                                class="form-control custom-select custom-select-lg mb-3">
                                            <option value=""></option>
                                        </select>
                                        @if($errors->has('sub_category_id'))
                                            <div class="alert alert-danger">{{ $errors->first('sub_category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="prodCategory">Product Category</label>
                                        <select name="product_category_id" id="prodCategory"
                                                class="form-control custom-select custom-select-lg mb-3">
                                            <option value=""></option>
                                        </select>
                                        @if($errors->has('product_category_id'))
                                            <div class="alert alert-danger">{{ $errors->first('product_category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="productName">Name*</label>
                                        <input type="text" name="name" class="form-control" id="productName"
                                               placeholder="Product Name">
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price*</label>
                                        <input type="number" step="0.01" name="price" class="form-control" id="price"
                                               placeholder="Price">
                                        @if($errors->has('price'))
                                            <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="productDesc">Description</label>
                                <textarea rows="4" cols="50" name="description" class="form-control" id="productDesc"
                                          placeholder="Description"></textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="itemNo">Item No*</label>
                                        <input type="text" name="item_no" class="form-control" id="itemNo"
                                               placeholder="Item No">
                                        @if($errors->has('item_no'))
                                            <div class="alert alert-danger">{{ $errors->first('item_no') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="version">Version</label>
                                        <input type="text" name="versions" class="form-control" id="version"
                                               placeholder="Version">
                                        @if($errors->has('versions'))
                                            <div class="alert alert-danger">{{ $errors->first('versions') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="featured">Featured</label><br>
                                    <select name="featured" class="from-control" id="featured">
                                        <option value="1">Ordinary</option>
                                        <option value="0">Best Sell</option>
                                        <option value="2">Special</option>
                                        <option value="3">Classic</option>

                                    </select>
                                    @if($errors->has('featured'))
                                        <div class="alert alert-danger">{{ $errors->first('featured') }}</div>
                                    @endif
                                </div>
                            </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        <input type="text" name="color" class="form-control" id="color">
                                        @if($errors->has('color'))
                                            <div class="alert alert-danger">{{ $errors->first('color') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="collection">Collection</label>
                                        <input type="text" class="form-control" name="collection" id="collection">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <input type="text" name="brand" class="form-control" id="brand">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="collection">Product Code</label>
                                        <input type="text" class="form-control" name="product_code" id="product_code">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sizes">Sizes</label>
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="sizes[]" id="sizes" class="form-control"
                                                   placeholder="Enter product size"></td>
                                        <td>
                                            <button id="add" name="add" class="btn btn-default">Add More</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pdf">PDF</label>
                                        <input type="file" name="pdf" id="pdf">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="default_img">Default Photo</label>
                                        <input type="file" name="default_img" id="default_img">
                                        @if($errors->has('default_img'))
                                            <div class="alert alert-danger">{{ $errors->first('default_img') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="photos">Product Photos</label>
                                        <input type="file" name="imgs[]" id="photos" multiple>
                                    </div>
                                </div>
                            </div>


                        </div>

                    {{-- @include('dashboard.partials.errors') --}}
                    <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            // fetch sub-category and show it in the dom on selecting 'category'
            $('#category').on('change', function (event) {
                let cat_id = event.target.value;

                // fetch data with AJAX request
                $.get('/ajax-subcat?cat_id=' + cat_id, function (data) {
                    $('#subCategory').empty();
                    $.each(data, function (index, subCatObj) {
                        $('#subCategory').append(`<option value="${subCatObj.id}">${subCatObj.name}</option>`)
                    })
                });
            });

            // fetch product-category and show it in the dom on selecting 'sub-category'
            $('#subCategory').on('change', function (event) {
                let sub_id = event.target.value;
                // fetch data with ajax request
                $.get('/ajax-prodcat?sub_id=' + sub_id, function (data) {
                    $('#prodCategory').empty();
                    $.each(data, function (index, subCatObj) {
                        console.log(subCatObj);
                        $('#prodCategory').append(`<option value="${subCatObj.id}">${subCatObj.name}</option>`)
                    })
                })
            })

            var i = 1;
            $('#add').click(function (event) {
                event.preventDefault();
                i++;
                $('#dynamic_field').append(`
                                    <tr id="row${i}">
                                        <td><input type="text" name="sizes[]" id="sizes" class="form-control" placeholder="Enter Product size"></td>
                                        <td><button id="${i}" name="remove" class="btn btn-danger btn-remove"><span>x</span></button></td>
                                    </tr>`)
            })
            $(document).on('click', '.btn-remove', function () {
                const button_id = $(this).attr("id");
                $(`#row${button_id}`).remove();
            })
        })
    </script>
@stop

