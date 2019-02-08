@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Background Photo</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('create-photo') }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputFile">Background Photo</label>
                                <input type="file" name="input_img" id="exampleInputFile">
                                @if($errors->has('input_img'))
                                    <div class="alert alert-danger">{{ $errors->first('input_img') }}</div>
                                @endif
                            </div>
                        </div>

                        <div>
                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Background Photo</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Photo</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @if(isset($categories))
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{ $category->description }}
                                        </td>
                                        <td>
                                            <img width="80px"
                                                 src="{{  url('storage/' . $category->img) }}"
                                                 alt="{{ $category->name }}">
                                        </td>
                                        <td>
                                            <a href="{{ url('dashboard/edit-category', ['id' => $category->id]) }}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete-category', ['id' => $category->id]) }}"
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
        <!-- /.row -->
    </section>
@stop

