<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupon;
use App\Models\FashionDesign;
use App\Models\Order;
use Carbon\Carbon;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   public function index(Request $request)
   {
      $contents = Cart::content();
      $d = '';
      foreach ($contents as $key => $value) {
         $d = $value->options->designer;
      }
      $coupon = null;
      if($request->coupon){
         $coupon = DiscountCoupon::where('code', $request->coupon)
                  ->where('valid_from', '<=', date('Y-m-d'))
                  ->where('valid_to', '>=', date('Y-m-d'))
                  ->where('designer_id', $d)
                  ->first();

      }
      return view('customer.order.index', compact('contents', 'coupon'));
   }

   public function order(Request $request)
   {
      $data = $request->validate([
         'card_name'    => 'required|string|min:2|max:80',
         'card_number'  => 'required|numeric',
         'card_date'    => 'required',
         'card_cvv'     => 'required',
         'address'      => 'required' ,
      ]);

      $coupon = null;
      if($request->coupon){
         $d = '';
         foreach (Cart::content() as $key => $value) {
            $d = $value->options->designer;
         }
         $coupon = DiscountCoupon::where('code', $request->coupon)
                  ->where('valid_from', '<=', date('Y-m-d'))
                  ->where('valid_to', '>=', date('Y-m-d'))
                  ->where('designer_id', $d)
                  ->first();

      }
      $dis = $coupon ? getDiscountValue($coupon->discount_percentage, Cart::subtotal()) : 0;

      DB::beginTransaction();

      try {

         $order = Order::create([
            'customer_id'     => auth('customers')->id(),
            'total_amount'    => (Cart::subtotal() - $dis),
            'discount_value'  => $dis,
            'status'          => 'pending'
         ]);
         foreach (Cart::content() as $key => $value) {
            $item = $order->items()->create([
                     'product_id'  => $value->id,
                     'quantity'           => $value->qty,
                     'price'              => $value->price,
                     'selected_fabric'    => $value->options->fabric,
                     'selected_color'     => $value->options->color,
                     'selected_size'      => $value->options->size,
                  ]);
            if($value->options->custom && $value->options->custom != ''){
               $custom = $item->customization()->create([
                  'product_id'     => $value->id,
                  'customization_details' => $value->options->custom,
                  'customer_id'           => auth('customers')->id(),
               ]);
            }
         }
         $order->invoice()->create([
            'invoice_number'  => time() . rand(100, 9999),
            'invoice_date'    => date('Y-m-d'),
            'billing_address' => $request->address,
            'total_amount'    => $order->total_amount
         ]);
         $order->payment()->create([
            'amount'         => $order->total_amount,
            'payment_method' =>   'credit_card',
            'payment_status' => 'paid',
            'transaction_id' => time() . rand(100, 9999)
         ]);

         DB::commit();
         Cart::destroy();
         return redirect()->route('customer.cart.index')->with('success', 'Thank you for order with us, We has recieved your order and we will contact you soon.');
      } catch (\Exception $e) {
         DB::rollback();
         return redirect()->route('customer.cart.index')->with('fail', 'Something went wrong try again.');
      }
   }

}
