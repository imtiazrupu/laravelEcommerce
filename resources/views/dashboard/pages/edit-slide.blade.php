@extends('dashboard.index')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slide</h3>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ url('edit-slide', ['id' => $slide->id ]) }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="textOne">Text One</label>

                                       <textarea rows="4" cols="50" name="text_one" class="form-control" id="textOne"
                            placeholder="Text one"> {{ $slide->text_one}}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="textTwo">Text Two</label>
                                       <textarea rows="4" cols="50" name="text_two" class="form-control" id="textTwo"
                                          placeholder="Text Two"> {{ $slide->text_two}}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="textThree">Text Three</label>
                                       <textarea rows="4" cols="50" name="text_three" class="form-control" id="textThree"
                                          placeholder="Text Three">{{ $slide->text_three}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="buttonOne">Button One</label>
                                <input type="text" name="button_one" class="form-control" id="buttonOne"
                                       value="{{ $slide->button_one}}">
                            </div>
                            <div class="form-group">
                                <label for="buttonTwo">Button Two</label>
                                <input type="text" name="button_two" class="form-control" id="buttonTwo"
                                value="{{ $slide->button_two}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Slide Photo</label>
                                <img width="300px" src="{{ url('storage/'. $slide->img) }}" alt="">
                                <input type="file" name="img" id="exampleInputFile">

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

