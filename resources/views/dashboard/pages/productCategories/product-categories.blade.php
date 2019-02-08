@extends('dashboard.index')

@section('page-header')
    Product Category
@stop

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product-Categories</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('product-category') }}" method="post" role="form"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" class="form-control custom-select custom-select-lg mb-3">
                                            <option selected>Select category</option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('category_id'))
                                            <div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                            </div>

                            <div class="form-group">
                                <label for="subCategoryName">Product Category Name</label>
                                <input type="text" name="name" class="form-control" id="subCategoryName"
                                       placeholder="Sub Category Name">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="subCategoryDesc">Description</label>
                                <textarea rows="4" cols="50" name="description" class="form-control"
                                          id="subCategoryDesc"
                                          placeholder="Description"></textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Sub Category Photo</label>
                                <input type="file" name="input_img" id="exampleInputFile">
                                @if($errors->has('input_img'))
                                    <div class="alert alert-danger">{{ $errors->first('input_img') }}</div>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                            <h3 class="box-title">Product Categories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Photo</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @if(isset($productCategories))
                                    @foreach($productCategories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                {{ $category->description }}
                                            </td>
                                            <td>
                                                <img width="80px"
                                                     src="{{  url('storage/'.$category->img) }}"
                                                     alt="{{ $category->name }}">
                                            </td>

                                            <td>
                                                <a href="{{ url('dashboard/edit-product-category', ['id' => $category->id]) }}"
                                                   class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{ url('delete-product-category', ['id' => $category->id]) }}"
                                                   class="btn btn-danger btn-sm">
                                                    Delete
                                                </a>
                                            </td>
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
        $(document).ready(function () {
            $('#category').on('change', function (event) {
                console.log(event.target.value);
                let cat_id = event.target.value;
                $.get('/ajax-subcat?cat_id=' + cat_id, function (data) {
                    $('#subCategory').empty();
                    $.each(data, function (index, subCatObj) {
                        $('#subCategory').append(`<option value="${subCatObj.id}">${subCatObj.name}</option>`)
                    })
                })
            })
        })
    </script>
@stop
