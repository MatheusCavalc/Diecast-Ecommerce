<?php

namespace App\Livewire\App;

use App\Enums\PaymentStatus;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CheckoutView extends Component
{
    #[Rule('required')]
    public $total_price = '';

    #[Rule('required')]
    public $cars = [];

    #[Rule('required')]
    public $email = '';

    #[Rule('required')]
    public $address1 = '';

    #[Rule('required')]
    public $state = '';

    #[Rule('required')]
    public $zipcode = '';

    #[Rule('required')]
    public $status_payment = '';

    #[Rule('required')]
    public $created_by = '';

    public function placeOrder()
    {
        $cart = session()->get('cart');

        $this->total_price = $cart == null ? 0 : array_sum(array_map(fn ($item) => $item['total_price'], $cart));

        $this->cars = $cart;

        $this->status_payment = PaymentStatus::Pending;

        $this->created_by = auth()->user()->id;

        $this->validate();

        //sync
        $order = Order::create($this->all());

        if ($order) {
            session()->forget('cart');

            $this->dispatch('cart-updated');
        }


        //CHECKOUT (PAYMENT)
        /*
        Stripe::setApiKey(getenv('STRIPE_SECRET'));

        $lineItems = [];
        foreach ($this->sneakers as $sneaker) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'sneaker_data' => [
                        'name' => $sneaker['name'],
                    ],
                    'unit_amount_decimal' => $sneaker['price'] * 100,
                ],
                'quantity' => $sneaker['quantity'],
            ];
        }

        $session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('/checkout/success', ['order_id' => $order->id], true) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('/checkout/failure', ['order_id' => $order->id], true),
        ]);

        return redirect($session->url);
        */
    }

    public function removeItem($car_id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$car_id])) {
            unset($cart[$car_id]);
            session()->put('cart', $cart);

            $this->dispatch('cart-updated');
        }
    }

    #[Title('Home')]
    #[Layout('layouts.main')]
    #[On('cart-updated')]
    public function render()
    {
        $cart = session()->get('cart');

        $total_value = $cart == null ? 0 : array_sum(array_map(fn ($item) => $item['total_price'], $cart));

        return view('livewire.app.checkout-view', [
            'cartBox' => json_decode(json_encode($cart), FALSE),
            'total_value' => $total_value
        ]);
    }
}
