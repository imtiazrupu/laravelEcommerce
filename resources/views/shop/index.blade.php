<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
 @include('shop.homepage.head.head_asset')
 <script src="https://cdn.jsdelivr.net/npm/vue"></script>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <div id="app" style="margin: 0px; padding: 0px;">
        <!-- Header-->
        <header id="header">
        @include('shop.homepage.header.header')
        </header>
        <!-- End header -->

        @yield('body_content')

        <section>

            @include('shop.homepage.footer.safe_payment')

        </section>

    </div>
<footer id="footer-block">
@include('shop.homepage.footer.social')
@include('shop.homepage.footer.information')
@include('shop.homepage.footer.copyRight')

</footer>
<script>
    const cartUrl = '{{url('get-cart-response')}}';
    var app = new Vue({
        el: '#app',
        created () {
            axios.get(cartUrl).then(res => res.data)
                .then(data => {
                    console.log(data)
                    this.cartItems = data.cartItems
                    this.totall = data.total
                    this.totallQty = data.totalQty
                })
        },
        data: {
            totall: '',
            cartItems: '',
            totallQty: ''
        },
        methods: {
            fatchCartData () {
                axios.get(cartUrl).then(res => res.data)
                .then(data => {
                    console.log(data)
                    this.cartItems = data.cartItems
                    this.totall = data.total
                    this.totallQty = data.totalQty
                })
            }
        }
    })
</script>
<!-- End Section footer -->
@include('shop.homepage.footer.footerAsset')

<!--Here will be Google Analytics code from BoilerPlate-->
</body>

</html>
