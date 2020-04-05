<?php 

namespace Modules\Core\Services\Payment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = config('myapp.paypal_client_id',env('PAYPAL_CLIENT_ID'));
        $clientSecret = config('myapp.paypal_client_secret',env('PAYPAL_CLIENT_SECRET'));
        return new SandboxEnvironment($clientId, $clientSecret);
    }

    public function check($orderId){
        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderId));
        return $response;
    }
}
