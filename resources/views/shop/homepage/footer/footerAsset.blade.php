<script src="{{asset('frontend/js/vendor/jquery.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('frontend/js/vendor/bootstrap.js')}}"></script>

<script src="{{asset('frontend/js/vendor/jquery.flexisel.js')}}"></script>
<script src="{{asset('frontend/js/vendor/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery.transit.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery.jcountdown.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery.jPages.js')}}"></script>
<script src="{{asset('frontend/js/vendor/owl.carousel.js')}}"></script>

<script src="{{asset('frontend/js/vendor/responsiveslides.min.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="{{asset('frontend/js/vendor/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/vendor/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/vendor/jquery.scrollTo-1.4.2-min.js')}}"></script>

<!-- Custome Slider  -->
<script src="{{asset('frontend/js/main.js')}}"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ms',}, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
jQuery(document).ready(function($) {
    $("#addToCart").click(function(){
        var markup = '';
        $.post("{{url('ajax-add-to-cart')}}",
        {
            _token: '{{csrf_token()}}',
            id: $("#product_id").val(),
            qty: $("#product_qty").val(),
            sizes: $("#sizes").val()
        },
        function(data,status){
            if(status === 'success') {
                $('#exampleModalCenter').modal('show');
                var cartItems = data.cartItems;
                var strogeUrl = "{{url('storage/')}}";
                Object.keys(cartItems).forEach(function(key) {
                    var productName = cartItems[key].name;
                    var productImage = strogeUrl +"/"+cartItems[key].attributes.default_img;
                    var imageCssClass = 'card_product_image';
                    var nameCssClass = 'card_product_name';
                    var sizeCssClass = 'card_product_model';
                    var priceCssClass = 'card_product_price';
                    var quantityCssClass = 'card_product_quantity';
                    var totalCssClass = 'card_product_total';
                    markup += '<tr>'+
                    '<td class="'+imageCssClass+'" >'+"<img title='"+productName+"' alt='"+productName+"' src='"+productImage+"'>" + '</td>'+
                    '<td class="'+nameCssClass+'">'+cartItems[key].name+'</td>'+
                    '<td class="'+sizeCssClass+'">'+cartItems[key].attributes.size+'</td>'+
                    '<td class="'+priceCssClass+'">'+cartItems[key].price+'</td>'+
                    '<td class="'+quantityCssClass+'">'+cartItems[key].quantity+'</td>'+
                    '<td class="'+totalCssClass+'">'+cartItems[key].price*cartItems[key].quantity+'</td>'+

                    '</tr>';
                });
                $('#cartTableBody').html(markup);
            } else {
                alert("Somthing Went wrong!! please reload and try again");
            }
        });
    });
});
</script>

{{-- <script>
    jQuery(document).ready(function($) {
        $("#addToCart2").click(function(){
            var markup = '';
            $.post("{{url('ajax-add-to-cart')}}",
            {
                _token: '{{csrf_token()}}',
                id: $("#product_id").val(),
                qty: $("#product_qty").val(),
                sizes: $("#sizes").val()
            },
            function(data,status){
                if(status === 'success') {
                    $('#exampleModalCenter').modal('show');
                    var cartItems = data.cartItems;
                    var strogeUrl = "{{url('storage/')}}";
                    Object.keys(cartItems).forEach(function(key) {
                        var productName = cartItems[key].name;
                        var productImage = strogeUrl +"/"+cartItems[key].attributes.default_img;
                        var imageCssClass = 'card_product_image';
                        var nameCssClass = 'card_product_name';
                        var sizeCssClass = 'card_product_model';
                        var priceCssClass = 'card_product_price';
                        var quantityCssClass = 'card_product_quantity';
                        var totalCssClass = 'card_product_total';
                        markup += '<tr>'+
                        '<td class="'+imageCssClass+'" >'+"<img title='"+productName+"' alt='"+productName+"' src='"+productImage+"'>" + '</td>'+
                        '<td class="'+nameCssClass+'">'+cartItems[key].name+'</td>'+
                        '<td class="'+sizeCssClass+'">'+cartItems[key].attributes.size+'</td>'+
                        '<td class="'+priceCssClass+'">'+cartItems[key].price+'</td>'+
                        '<td class="'+quantityCssClass+'">'+cartItems[key].quantity+'</td>'+
                        '<td class="'+totalCssClass+'">'+cartItems[key].price*cartItems[key].quantity+'</td>'+

                        '</tr>';
                    });
                    $('#cartTableBody').html(markup);
                } else {
                    alert("Somthing Went wrong!! please reload and try again");
                }
            });
        });
    });
    </script> --}}


