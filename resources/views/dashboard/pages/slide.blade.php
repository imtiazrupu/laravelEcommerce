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
                    <form action="{{ url('create-slide') }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="textOne">Text One</label>

                                       <textarea rows="4" cols="50" name="text_one" class="form-control" id="textOne"
                                          placeholder="Text one"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="textTwo">Text Two</label>
                                       <textarea rows="4" cols="50" name="text_two" class="form-control" id="textTwo"
                                          placeholder="Text Two"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="textThree">Text Three</label>
                                       <textarea rows="4" cols="50" name="text_three" class="form-control" id="textThree"
                                          placeholder="Text Three"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="buttonOne">Button One</label>
                                <input type="text" name="button_one" class="form-control" id="buttonOne"
                                       placeholder="Button One">
                            </div>
                            <div class="form-group">
                                <label for="buttonTwo">Button Two</label>
                                <input type="text" name="button_two" class="form-control" id="buttonTwo"
                                       placeholder="Button Two">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Slide Photo</label>
                                <input type="file" name="input_img" id="exampleInputFile">

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
                                <th>Button One</th>
                                <th>Button Two</th>
                                <th>Photo</th>
                                <th>Text One</th>
                                <th>Text Two</th>
                                <th>Text Three</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @if(isset($slides))
                                @foreach($slides as $key => $slide)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $slide->button_one }}</td>
                                        <td>{{ $slide->button_two }}</td>
                                        <td>
                                                <img width="80px"
                                                     src="{{  url('storage/' . $slide->img) }}"
                                                     alt="">
                                         </td>
                                        <td>{{ $slide->text_one }}</td>
                                        <td>{{ $slide->text_two }}</td>
                                        <td>{{ $slide->text_three }}</td>

                                        <td>
                                            <a href="{{ url('dashboard/edit-slide', ['id' => $slide->id]) }}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete-slide', ['id' => $slide->id]) }}"
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

