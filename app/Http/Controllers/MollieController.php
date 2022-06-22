<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderAdress;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{

    public function __construct()
    {
        Mollie::api()->setApiKey('test_s5cSRg8NRzV7cB2nreHQmywbSne4ub'); // your mollie test api key
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {


        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => number_format(Session::get('cart')->totalPrice, 2, '.', '') // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment By codehunger',
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        Session::put('payment', $payment);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess()
    {
        $order = new Order();
        $order->order_mollie_id = Session::get('payment')->id;
        $order->user_id = Auth::user()->id;
        $order->total_amount = Session::get('payment')->amount->value;
        $order->payed = 'payed';

        $order->save();

        foreach (Session::get('cart')->products as $product) {

            $orderDetails = new OrderDetails();
            $orderDetails->order_mollie_id = Session::get('payment')->id;
            $orderDetails->order_id = $order->id;
            $orderDetails->product_details_id = $product['product_id'];
            $orderDetails->client_number = $product['product']->id;
            $orderDetails->user_name = Auth::user()->first_name . " " . Auth::user()->last_name;
            $orderDetails->product_name = $product['product']->name;
            $orderDetails->product_price = $product['product_price'];
            $orderDetails->aantal = $product['quantity'];
            $orderDetails->total_price = $product['quantity'] * $product['product_price'];

            $orderDetails->save();
        }

        $orderAdress = new OrderAdress();
        $orderAdress->order_id = $order->id;
        $orderAdress->street = Session::get('orderAdress')->street;;
        $orderAdress->street_number = Session::get('orderAdress')->street_number;
        $orderAdress->city = Session::get('orderAdress')->city;
        $orderAdress->zip_code = Session::get('orderAdress')->zip_code;
        $orderAdress->country = Session::get('orderAdress')->country;

        $orderAdress->save();

        Session::forget('cart');

        return redirect(route('thanksPage'));
    }
}
