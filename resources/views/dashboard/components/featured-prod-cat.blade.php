<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Featured Product Categories</h3>
    </div>
    <div class="panel-body">
        <form action="{{ url('featured-product-category') }}" method="POST">
            @csrf

                <div class="form-group">
                    <label for="prod_cat_id"></label>
                    <select class="form-control" name="prod_cat_id" id="prod_cat_id">
                        @foreach($best_sale as $cat)
                            <option class="form-control"
                                    value="{{ $cat->id }}">{{ $cat->name }}
                                </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>
