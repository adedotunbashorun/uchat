<?php namespace Modules\Checkout\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Checkout\Exceptions\CheckoutException;
use Modules\Checkout\Http\Requests\FormRequest;
use Modules\Users\Repositories\AuthenticationInterface;
use Modules\Core\Services\Payment\StripeApi;
use Modules\Core\Services\Payment\PayPalClient;
use DB;

class CheckoutController extends Controller {

    protected $stripe, $auth, $paypal;

    public function __construct(AuthenticationInterface $auth, StripeApi $stripe, PayPalClient $paypal)
    {
        $this->auth = $auth;
        $this->stripe = $stripe;
        $this->paypal = $paypal;
    }

    public function index(FormRequest $request)
    {
        $data = $request->session()->get('checkout_data');
        if (is_null($data)) {
            return redirect()->route('courses');
        }
        $user = $this->auth->check();
        if(empty($user)){
            session()->forget('url.intended');
            session()->put('url.intended',route('checkout'));
            return redirect('login')->withError('Login is required to continue');
        }

        $page = new \stdClass();
        $page->title = 'Checkout';
        $page->body = '';
        $page->meta_description = '';
        $page->css = '';
        $page->js = '';

        return view('checkout::index')
            ->with($data)->with('page',$page);
    }

    public function process(FormRequest $request)
    {
        DB::beginTransaction();
        try {
            $checkout_data = session()->get('checkout_data');
            if(empty($checkout_data)){
                throw new CheckoutException('Please select a course class to continue');
            }
            $data = $request->all();
            $payment_payload = json_decode($data['payment_payload'], true);
            $payment_method = $payment_payload['payment_method'];

            $user = $this->auth->check();

            $schedule = \Schedules::byId($data['schedule_id']);

            validate_schedule_registration($schedule,$user);

            if($payment_method == 'stripe'){
                $stripe_payload = [
                    'amount' => $data['amount'],
                    'description' => $data['description'],
                    'token' => $payment_payload['token']
                ];
                $payment = $this->stripe->charge($stripe_payload);
            }else{
                $payment = $this->paypal->check($payment_payload['token']);
            }

            $schedule->orders()->create([
                'order_number' => generate_order_no(),
                'reference' => $payment['id'],
                'status' => 'completed',
                'payment_method' => $payment_method,
                'user_id' => $user->id,
                'total' => $data['amount'],
                'schedule_price' => $schedule->price,
            ]);

            DB::commit();

            session()->forget('checkout_data');

            if($request->ajax()){
                return response()->json([
                    'msg'   => "Order Successful!",
                    'data' => $payment,
                    'type'  => true
                ], 200);
            }
            return redirect()->to('/');
        } catch (\Exception $e) {
            DB::rollback();
            $message = 'Please try again or check back later';
            if($e instanceof CheckoutException) $message = $e->getMessage();
            if($request->ajax()){
                return response()->json($message, 400);
            }     
            return redirect()->back();
        }
    }
}
