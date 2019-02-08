<form id="id01" method="post" action="{{url('blog-comment')}}">
    @csrf
    <input type="hidden" name="blog_id" value="{{ $blogPost->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputFirstName" class="control-label">Name:<span class="text-error">*</span></label>
                    <div>
                        <input type="text" class="form-control" name="name" id="inputFirstName">
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputLastName" class="control-label">Email:<span class="text-error">*</span></label>
                    <div>
                        <input type="email" class="form-control" name="email" id="inputLastName">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="inputSubject" class="control-label">Subject:<span class="text-error">*</span></label>
                    <div>
                        <input type="text" class="form-control" name="subject" id="inputSubject">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="inputText" class="control-label">Text:<span class="text-error">*</span></label>
                    <div>
                        <textarea class="form-control" name="comment" id="inputText"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <input type="submit" class="btn-default-1" value="Submit">
    </form>
