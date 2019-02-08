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
                    <form action="{{ url('edit-mordern-collections', ['id' => $mordern->id ]) }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="description">Description</label>

                                       <textarea rows="4" cols="50" name="description" class="form-control" id="description"
                            placeholder="Description">{{$mordern->description}}</textarea>

                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Name" value="{{$mordern->name}}">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile">Default Photo</label>
                                <img width="300px" src="{{ url('storage/'. $mordern->img) }}" alt="">
                                <input type="file" name="input_img" id="exampleInputFile">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <img width="300px" src="{{ url('storage/'. $mordern->img2) }}" alt="">
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

                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@stop

