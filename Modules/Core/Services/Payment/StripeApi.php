<?php
namespace Modules\Core\Services\Payment;
use Stripe;

class StripeApi {

    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('myapp.stripe_secret',env('STRIPE_SECRET'));
    }

    /**
     * @param $payload
     * @return Stripe\Charge
     * @throws Stripe\Exception\ApiErrorException
     */
    public function charge($payload)
    {
        Stripe\Stripe::setApiKey($this->apiKey);
        return Stripe\Charge::create ([
            "amount" => $payload['amount'] * 100,
            "currency" => "usd",
            "source" => $payload['token'],
            "description" => $payload['description']
        ]);
    }
}
