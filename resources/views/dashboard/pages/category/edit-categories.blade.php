@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    @if(isset($category))
                        <form action="{{ url('edit-category', ['id' => $category->id]) }}" role="form" enctype="multipart/form-data" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" value="{{ $category->name }}" name="name" class="form-control"
                                           id="categoryName"
                                           placeholder="Sub Category Name">
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="categoryDesc">Description</label>
                                    <textarea rows="4" cols="50" name="description" class="form-control"
                                              id="categoryDesc"
                                              placeholder="Description">{{ $category->description }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                        <label for="img">Category Photo:</label>
                                    <img width="300px" src="{{ url('storage/'. $category->img) }}" alt="">

                                    <input type="file" class="form-control" name="img" id="img">
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
                    @endif
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@stop

