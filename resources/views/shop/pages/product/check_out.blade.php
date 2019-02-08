<article class=" col-md-4 ">
        <div class="block-form block-order-total box-border wow fadeInRight" data-wow-duration="1s">
            <h3><i class="fa fa-dollar"></i> Total</h3>
            <hr>
            <ul class="list-unstyled">
                <li>Sub Total: <strong>RM  @{{totall}}</strong></li>
            <li>Pricing Sharge: <strong>RM 0.00</strong></li>
                <li>Promotion Discound: <strong>RM 0.00</strong></li>
                <li>VAT: <strong>RM 10.00</strong></li>
                <li><hr></li>
                <li>Total: <strong>RM  @{{totall+10}}</strong></li>
                {{-- <li <b>Total:</b> <strong>RM {{\Cart::getSubTotal()+10}}</strong></li> --}}
            </ul>
        <a href="{{('/')}}"> <input type="submit"  value="Contuine Shoping"  class="btn-default-1"></a>
            <a href="{{('shop/checkout')}}"  class="btn-default-1">Checkout</a>
        </div>
    </article>
