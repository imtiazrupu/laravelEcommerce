@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Our Store</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('edit-our-store', ['id' => $ourstore->id]) }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                                <div class="form-group">
                                        <label for="name">Letter</label>
                                        <input type="text" name="letter" class="form-control" id="letter"
                                               placeholder="letter" value="{{$ourstore->letter}}">
                                    </div>
                                <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Name" value="{{$ourstore->name}}">
                                    </div>
                            <div class="form-group">
                                <label for="description">Description</label>

                                       <textarea rows="4" cols="50" name="description" class="form-control" id="description"
                                          placeholder="Description">{{$ourstore->description}}</textarea>

                            </div>

                            <div class="form-group">
                                    <label for="description">Description 2</label>

                           <textarea rows="4" cols="50" name="description2" class="form-control" id="description"
                            placeholder="Description2">{{$ourstore->description2}}</textarea>

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

        <!-- /.row -->
    </section>
@stop

