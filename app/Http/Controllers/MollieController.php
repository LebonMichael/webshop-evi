<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        Session::put('payment',$payment);

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
        $order->payed = Session::get('payment')->status;

        $order->save();


        return redirect(route('thanksPage'));
    }
}
