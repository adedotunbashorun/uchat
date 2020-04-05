<?php namespace Modules\Cart\Http\Controllers;

use Cart;
use Illuminate\Routing\Controller;
use Modules\Cart\Http\Requests\FormRequest;
use Modules\Checkout\Exceptions\CheckoutException;
use Modules\Products\Entities\Product;
use Modules\Users\Repositories\AuthenticationInterface;
use Request, Notification;

class CartController extends Controller
{

    public function __construct(AuthenticationInterface $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $items = Cart::content();
        return view('cart::index')
            ->with(compact('items'));

    }

    public function add(FormRequest $request)
    {
        try{
            request()->session()->forget('checkout_data');
            $class_id = $request->all('class_id');
            $class = \Schedules::byId($class_id,['course']);

            validate_schedule_registration($class);

            request()->session()->put('checkout_data', ['class'=>$class]);

            if($request->ajax()){
                return response()->json('success', 200);
            }
            return redirect()->route('checkout');
        }catch(\Exception $e){
            $message = 'Please try again or check back later';
            if($e instanceof CheckoutException) $message = $e->getMessage();
            if($request->ajax()){
                return response()->json($message, 400);
            }
            return redirect()->back();
        }
    }

    public function update(FormRequest $request)
    {
        $items = $request->get('cart');
        foreach ($items as $id => $cart) {
            if ($cart['qty'] != 0) {
                Cart::update($cart['rowId'], $cart['qty']);
            }
        }

        return redirect()->route('cart.show');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect()->route('cart.show');
    }

    public function remove($item_id)
    {
        Cart::remove($item_id);
        return redirect()->route('cart.show');
    }

}
