@extends('dashboard.index')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Blogs</h3>
          @if(session()->has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
          @endif
        </div>
        <div class="box-body">
          <form action="{{ route('create-blog') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" name="title" class="form-control" id="title">
                @if($errors->has('title'))
                  <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="blog-content">Content*</label>
                <textarea rows="4" cols="50" name="content" class="form-control"
                          id="blog-content"></textarea>
                @if($errors->has('content'))
                  <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="img">Image</label>
                <input class="form-control" type="file" name="img" id="img">
                @if($errors->has('img'))
                  <div class="alert alert-danger">{{ $errors->first('img') }}</div>
                @endif
              </div>
            </div>

            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary" style="width: 100%">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Blogs</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th style="width: 30%">Title</th>
              <th>Content</th>
              <th style="width: 100px">Image</th>
              <th>Publish</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            {{-- @foreach($blogs as $index => $blog)
              <tr>
                <td>{{ $index+1  }}</td>
                <td>{{ $blog['title'] }}</td>
                <td>{{ $blog['content'] }}</td>
                <td><img width="100px" src="{{ url('storage/' . $blog['img']) }}"
                         alt="{{ $blog['title'] }}"></td>
                <td>
                  @if($blog['published'])
                    <a href="#" class="btn btn-success btn-sm" disabled>Published</a>
                  @else
                    <a href="{{ url('publish-blog', ['id' => $blog['id']]) }}"
                       class="btn btn-success btn-sm">Publish</a>
                  @endif
                </td>
                <td>
                  <a href="{{ url('edit-blog', ['id' => $blog['id']]) }}"
                     class="btn btn-primary btn-sm">
                    edit
                  </a>
                </td>
                <td>
                  <a href="{{ url('delete-blog', ['id' => $blog['id']]) }}"
                     class="btn btn-danger btn-sm">
                    delete
                  </a>
                </td>
              </tr>
            @endforeach --}}
          </table>
        </div>
      </div>
    </div>
  </div>
@stop

@section('script')
  <script>
    // var quill = new Quill('#blog-content', {
    //     theme: 'snow'
    // })
  </script>
@stop
