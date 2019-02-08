
                        <div class="box-border block-form">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills  nav-justified">
                                <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#additional" data-toggle="tab" class="disabled">Additional</a></li>
                                <li><a href="#review" data-toggle="tab">Review</a></li>
                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <br>
                                    <h3>Product Details</h3>
                                    <hr>
                                    <p>
                                        {{ $product->description}}
                                    </p>

                                </div>
                                <div class="tab-pane" id="additional">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Sizes</h3>
                                            <hr>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                            </p>

                                        </div>
                                        <div class="col-md-4 block-color">
                                            <h3>Colors</h3>
                                            <hr>
                                            <ul class="colors clearfix list-unstyled">
                                                <li><a href="#" rel="003d71"></a></li>
                                                <li><a href="#" rel="c42c39"></a></li>
                                                <li><a href="#" rel="f4bc08"></a></li>
                                                <li><a href="#" rel="02882c"></a></li>
                                                <li><a href="#" rel="000000"></a></li>
                                                <li><a href="#" rel="caccce"></a></li>
                                                <li><a href="#" rel="ffffff"></a></li>
                                                <li><a href="#" rel="f9e7b6"></a></li>
                                                <li><a href="#" rel="ef8a07"></a></li>
                                                <li><a href="#" rel="5a433f"></a></li>
                                                <li><a href="#" rel="ff9bb5"></a></li>
                                                <li><a href="#" rel="8c56a9"></a></li>
                                            </ul>

                                        </div>
                                        <div class="col-md-4">
                                            <h3>Other</h3>
                                            <hr>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
                                            </p>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane" id="review">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                           
                                            <h3>Clients review</h3>
                                            <hr>

                                            @foreach ($reviewList as $review)

                                            <div class="review-header">
                                            <h5>{{ $review->name }} </h5>
                                                <div class="product-rating">
                                                    <div class="stars">
                                                        @php($stars = $review->rating)
                                                        @for($i = 5; $i >= 1; $i--)
                                                            @if($i <= $stars)
                                                            <span class="star active"></span>
                                                            @else
                                                            <span class="star"></span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <small class="text-muted">{{ $review->updated_at }}</small>
                                            </div>
                                            <div class="review-body">
                                            <p>{{ $review->review }}</p>

                                            </div>
                                            @endforeach
                                            <hr>


                                            <hr>
                                        </div>
                                    </div>

                                <form id="id01" role="form" method="post" action="{{ url('product-review') }}" >
                                    @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputFirstName" class="control-label">Name:<span class="text-error">*</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" id="inputFirstName" name="name">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCompany" class="control-label">Company:</label>
                                                    <div>
                                                        <input type="text" class="form-control" id="inputCompany" name="company">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="review" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label  class="control-label" >Your Rate:</label>
                                                    <div class="product-rating" >
                                                        <div class="stars" >
                                                            <span id="star5" class="star" onClick="setDay(5);"></span>
                                                            <span id="star4" class="star" onClick="setDay(4);"></span>
                                                            <span id="star3" class="star" onClick="setDay(3);"></span>
                                                            <span id="star2" class="star" onClick="setDay(2);"></span>
                                                            <span id="star1" class="star" onClick="setDay(1) ;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit"  class="btn-default-1" value="Add Review">
                                    </form>

                                    <script type="text/javascript">
                                        function setDay($day)
                                        {
                                            let star = $day
                                            for(j = 1; j <= 5; j++) {
                                                $("#star"+j).removeClass("active");
                                            }
                                            for(i = 1; i <= star; i++) {
                                                $("#star"+i).addClass("active");
                                            }
                                            var x = document.createElement("INPUT");
                            x.setAttribute("type", "hidden");
                            x.setAttribute("name", "rating");
                            x.setAttribute("value", $day);
                            var element = document.getElementById("id01");
                            $("#id01").val(element);
                            element.appendChild(x);
                                        }
                                    </script>

                                </div>

                            </div>



                        </div>
