<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Create Featured</h3>
    </div>
    <div class="panel-body">
        <h2>Categories</h2>
        <div>
            @isset($categories)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Priority</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- @foreach($categories as $cat) --}}
                        <tr>
                            <td>
                                {{-- {{ $cat->name }} --}}
                            </td>
                            <td>
                                {{-- {{ $cat->featured }} --}}
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                    </tbody>
                </table>
            @endisset
        </div>
        <form action="{{ url('/featured') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="#" selected>select a category</option>
                    @isset($categories)
                        @foreach($categories as $cat)
                            <option
                            {{-- value="{{ $cat->id }}"  --}}
                            selected>
                                {{-- {{ $cat->name }} --}}
                            </option>
                        @endforeach
                    @endisset
                </select>
                @if($errors->has('category_id'))
                    <div class="alert alert-danger">
                        {{-- {{ $errors->first('category_id') }} --}}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <input class="form-control" type="number" min="0" value="0" name="featured"
                       id="priority">
            </div>

            <button type="submit" class="btn btn-primary">Set Priority</button>
        </form>
    </div>
</div>
