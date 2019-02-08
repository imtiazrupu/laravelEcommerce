
<div class="block-product-detail">
    <div class="row">
            <form action="{{url('buy-now')}}" method="post">
                    @csrf
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="product-image">
                <img id="product-zoom"  src="{{ url('storage/'.$product->default_img) }}" data-zoom-image="{{ url('storage/'.$product->default_img) }}" alt="">

                <div id="gal1">
                    @foreach ($product->productImages as $img)
                    <a href="javascript:;" data-image="{{ url('storage/' .$img->img) }}" data-zoom-image="{{ url('storage/' .$img->img) }}">
                        <img  width="70" id="img_01" src="{{ url('storage/' .$img->img) }}" alt="">
                    </a>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">


            <div class="product-detail-section">
                <h3>{{ $product->name}}</h3>

                <div class="product-rating">
                    <div class="stars">
                        {{-- <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span> --}}
                        <?php for ($i = 5; $i >= 1; $i--) {
                            if($i <= $rating) {
                                echo '<span class="star active">';
                            } else {
                                echo '<span class="star">';
                            }
                            }
                            ?>
                    </div>
                     <a href="#" class="review"> @php($i = 0)
                        @foreach($reviewList as $review)
                            @php($i++)
                        @endforeach
                        Reviews ({{ $i }})</a>

                </div>

                <div class="product-information">
                    <div class="clearfix">
                        <label class="pull-left">Brand:</label> <a href="#">{{ $product->brand}}</a><br>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Collection:</label> {{ $product->collection}}
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Product Code:</label> {{ $product->product_code}}
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Size:</label>
                        <select id="sizes" name="sizes" class="form-control">
                            {{-- <option selected disabled>-Select Size-</option> --}}
                        @foreach ($product->productSizes as $size)

                            <option value="{{ $size->size }}">{{ $size->size }}</option>

                         @endforeach
                        </select>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Availability:</label>
                        <p>{{ $product->available}} in stock</p>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Description:</label>
                        <div style="height: 40px;overflow: hidden">
                        <p class="description"> </p>
                        </div>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Price:</label>
                        <p class="product-price"><span>$469.99</span> {{ $product->price}}</p>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Quantity:</label>
                        {{-- return view('shop.pages.product.add_to_cart', compact('total', 'totalQty', 'cartItems')); --}}
                        <input id="product_id" type="hidden" name="id" value="{{$product->id}}">
                        <input id="product_qty" type="number" class="form-control" name="qty" value="1">
                    </div>
                    <div class="clearfix">
                        <label class="pull-left">Total:</label>
                        <p class="product-price">{{ $product->price}}</p>
                    </div>
                    <div class="shopping-cart-buttons">

                        <a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" title="Compare"><i class="fa fa-random"></i></a>
                    </div>


                    <button  id="addToCart2" type="submit"  value="buy" class="btn btn" style="background-color:#eb2c33; margin-top:10px; color:azure;"><i class="fa fa-cart-arrow-down"></i>  Buy Now </button>

                </div>
            </div>
        </div>
    </form>
    <button style="margin-top:10px; margin-left:13px;" id="addToCart" type="submit" value="cart" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-shopping-cart"></i>Add To Cart</button>

{{-- data-target="#exampleModalCenter" --}}
@include('shop.pages.product.popup')

    </div>

</div>


{{-- <button id="addToCart" type="submit" value="cart" class="btn btn-info" data-toggle="modal" ><i class="fa fa-shopping-cart"></i>  Add to cart</button> --}}




