@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mordern Collections</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('create-mordern-collections') }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="description">Description</label>

                                       <textarea rows="4" cols="50" name="description" class="form-control" id="description"
                                          placeholder="Description"></textarea>

                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Default Photo</label>
                                <input type="file" name="input_img" id="exampleInputFile">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="input_img2" id="exampleInputFile">

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
                        <h3 class="box-title">Slides</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Description</th>
                                <th>Name</th>
                                <th>Default Photo</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @if(isset($morderns))
                                @foreach($morderns as $key => $mordern)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $mordern->description }}</td>
                                        <td>{{ $mordern->name }}</td>
                                        <td>
                                                <img width="80px"
                                                     src="{{  url('storage/' . $mordern->img) }}"
                                                     alt="">
                                         </td>
                                         <td>
                                            <img width="80px"
                                                 src="{{  url('storage/' . $mordern->img2) }}"
                                                 alt="">
                                     </td>

                                        <td>
                                            <a href="{{ url('dashboard/edit-mordern-collections', ['id' => $mordern->id]) }}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete-mordern-collections', ['id' => $mordern->id]) }}"
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

