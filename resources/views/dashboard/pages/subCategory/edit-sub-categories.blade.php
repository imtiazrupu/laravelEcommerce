@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub-Categories</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('edit-sub-category', ['id' => $subCategory->id]) }}" method="post" role="form"
                          enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $subCategory->id }}">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="categoryId">Category</label>
                                <select class="form-control"
                                        name="category_id"
                                        id="categoryId"
                                        class="custom-select custom-select-lg mb-3">
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
                            <div class="form-group">
                                <label for="subCategoryName">Sub Category Name</label>
                                <input type="text" name="name" class="form-control" id="subCategoryName"
                                       value="{{ $subCategory->name }}">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="subCategoryDesc">Description</label>
                                <textarea rows="4" cols="50" name="description" class="form-control"
                                          id="subCategoryDesc">{{  $subCategory->description  }}</textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <img width="300px" src="{{ url('storage/' . $subCategory->img) }}" alt="{{ $subCategory->name }}"><br>
                                <label for="exampleInputFile">Sub Category Photo</label>
                                <input type="file" name="img" id="exampleInputFile">
                                @if($errors->has('img'))
                                    <div class="alert alert-danger">{{ $errors->first('img') }}</div>
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
    </section>
@stop
