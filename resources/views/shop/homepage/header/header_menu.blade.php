<div class="header-bg">
    <div class="header-main" id="header-main-fixed">
        <div class="header-main-block1">
            <div class="container">
                <div id="container-fixed">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ url('/') }}" class="header-logo"> <img src="{{asset('frontend/img/Logo.png')}}" alt=""></a>
                        </div>
                        <div class="col-md-5">
                            <div class="top-search-form pull-left">
                                <form action="{{url('all-products')}}" method="get">
                                    <input type="text" name="product" value="@if(isset($_GET['product'])) {{ $_GET['product'] }} @endif" placeholder="Search ..." class="form-control" >
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="header-mini-cart  pull-right ">
                                <a href="#"  data-toggle="dropdown" @click="fatchCartData()">
                                    Shopping cart
                                    <span>0 item(s)-0.00</span>
                                </a>
                                <div class="dropdown-menu shopping-cart-content pull-right">
                                    <div class="shopping-cart-items">


                                        <div v-for="item in cartItems" class="item pull-left">
                                            <img :src="'{{url('storage/')}}/' + item.attributes.default_img" alt="Product Name" class="pull-left" />
                                            <div class="pull-left">
                                                <p>@{{item.name}}</p>
                                                <p>RM @{{item.price}}&nbsp;<strong>x 3</strong></p>
                                            </div>
                                            <a :href="'{{url('remove-from-cart/')}}/'+item.id" onclick="if (! confirm('Continue?')) { return false; }" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                        </div>

                                        <div class="total pull-left">

                                            <table>
                                                <tbody class="pull-right">
                                                <tr>
                                                    <td><b>Sub-Total:</b></td>
                                                    <td>RM  @{{totall}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Eco Tax (-1.00):</b></td>
                                                    <td>$7.00</td>
                                                </tr>
                                                <tr>
                                                    <td><b>VAT (7.4%):</b></td>
                                                    <td>RM 10.00</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="color-active">
                                                    <td><b>Total:</b></td>
                                                    <td><b>RM  @{{totall+10}}</b></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a href="{{url('shop/checkout')}}" class="btn-read pull-right">Checkout</a>
                                            <a href="{{url('shopping-bag')}}" class="btn-read pull-right">View Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /header-mini-cart -->
                            <div class="top-icons">
                                <div class="top-icon"><a href="#" title="Wishlist"><i class="fa fa-heart"></i></a></div>
                                <div class="top-icon"><a href="#" title="Notification"><i class="fa fa-bell"></i></a><span>12</span></div>
                                <div class="top-icon"><a href="#" title="Login"><i class="fa fa-lock"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="header-main-block2">
            <nav class="navbar yamm  navbar-main" role="navigation">

                <div class="container">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="{{ url('/') }}" class="navbar-brand"><i class="fa fa-home"></i></a>
                    </div>
                    <div id="navbar-collapse-1" class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <!-- Classic list -->
                            <li ><a href="{{ url('/') }}"  >Home </i></a>

                            </li>

                            @php($categorys = \App\Http\Controllers\admin\CategoryController::category())
                            <!-- With content -->
                            {{-- {{ dd($categorys)}} --}}


                            @foreach ($categorys as $categori)


                            <li class="dropdown yamm-fw"><a  data-toggle="dropdown" class="dropdown-toggle"  style="cursor:pointer;">{{ $categori->name }} <i class="fa fa-caret-right fa-rotate-45"></i></a>
                                <ul class="dropdown-menu list-unstyled  fadeInUp animated">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                @foreach ($categori->subCategory as $subcat)
                                                {{-- @php(var_dump($subcat->productCategories)) --}}

                                                <div class="col-md-2">
                                                    <div class="header-menu">
                                                    <h4>{{$subcat->name}}</h4>
                                                    </div>
                                                    <ul class="list-unstyled">
                                                        @foreach ($subcat->productCategories as $product_cat)
                                                            <li><a href="{{ url('template-product-category',['id' => $product_cat->id]) }}">

                                                                {{ $product_cat->name }}

                                                            </a></li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                                @endforeach

                                                {{-- <div class="col-md-6">
                                                    <div class="banner">
                                                        <a href="#">
                                                            <img src="{{ url('storage/'.$categori->img) }}" class="img-responsive" alt="">
                                                        </a>
                                                    </div>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @endforeach



                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- /header-main-menu -->
</div>
