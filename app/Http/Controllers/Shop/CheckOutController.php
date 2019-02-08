<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Http\Requests\ShippingMethodRequest;
use App\Http\Requests\PaymentMethodRequest;

use App\Model\Order;
use App\Model\ShippingMethod;
use App\Model\OrderDetails;
use App\Model\Payment;
use App\Model\Shipping;
use Cart;
// use Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Mpdf\Mpdf;
use Mpdf\MpdfException;

class CheckOutController extends Controller

{
    private const VAT = 16 / 100;
    public function deliveryPage()
    {
        return view('shop.pages.delivery.delivery');
    }
    public function shippingPage()
    {
        return view('shop.pages.shipping.shipping');
    }
    public function paymentPage()
    {
        return view('shop.pages.payment.payment');
    }
    public function reviewPage()
    {
        return view('shop.pages.OderReview.OderReview');
    }
    public function shippings(ShippingRequest $request)
    {
        $bilingAddress = $request->all([
            'first_name', 'last_name', 'email',
            'phone', 'company', 'address',
            'state', 'city', 'post_code']);

        session()->put('bilingAddress', $bilingAddress);
        return redirect('shop/shipping');
    }
    public function payment(ShippingMethodRequest $request)
    {
        $payment = $request->all([
            'shipping']);

        session()->put('payment', $payment);
        // dd($request)->all();
        return redirect('shop/payment');
    }
    public function review(PaymentMethodRequest $request)
    {
        $review = $request->all([
            'payment']);

        session()->put('review', $review);
        //dd($request)->all();
        return redirect('shop/review');
    }
    public function createOrder(Request $request)
    {
        $uid = \Auth::id();
        $shippingData = session('bilingAddress');
        $shippingData['user_id'] = $uid;

        $shippingMethod['type'] = \Session::get('payment')['shipping'];

        $paymentData['type'] = \Session::get('review')['payment'];
        $paymentData['status'] = Payment::PENDING;

        // print_r($paymentData);
        // exit();

        $shippingMethodId = ShippingMethod::create($shippingMethod)->id;
        $paymentId = Payment::create($paymentData)->id;
        $shippingId = Shipping::create($shippingData)->id;

        $orderData['shipping_method_id'] = $shippingMethodId;
        $orderData['shipping_id'] = $shippingId;
        $orderData['payment_id'] = $paymentId;
        $orderData['user_id'] = $uid;
        $orderData['status'] = Order::ORDER_PENDING;
        $orderData['total'] = self::VAT * Cart::getTotal() + Cart::getTotal();


        $order = Order::create($orderData);

        foreach (Cart::getContent() as $item) {
            $data['product_id'] = $item->id;
            $data['product_name'] = $item->name;
            $data['qty'] = (int)$item->quantity;
            $data['size'] = $item->attributes->size;
            $data['image'] = $item->attributes->default_img;
            $data['sub_total'] = (int)$data['qty'] * (float)$item->price;
            $data['total'] = $data['sub_total'] * self::VAT + $data['sub_total'];

            $orderDetail = new OrderDetails($data);
            $order->orderDetails()->save($orderDetail);
        }

        Cart::clear();
        session()->forget('shipping');
        session()->flash('success', 'You have successfully made an order.');
        return redirect('');
    }
}
