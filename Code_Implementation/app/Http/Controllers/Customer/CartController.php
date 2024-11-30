<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupon;
use App\Models\FashionDesign;
use Carbon\Carbon;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
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
      return view('customer.cart.index', compact('contents', 'coupon'));
   }

   public function store(Request $request)
   {
      $fashion = FashionDesign::where('availability_status', 'available')->where('product_id', $request->id)->firstOrFail();
      $contents = Cart::content();
      $qty = $request->qty ?? 1;
      $isUpdate = 0;
      $canNotAdd = 0;

      foreach ($contents as $key => $value) {
         if($value->id == $request->id){
            Cart::update($key, $value->qty + $qty);
            $isUpdate = 1;
         }
         if($fashion->designer_id != $value->options->designer){
            $canNotAdd = 1;
         }
      }
      if($canNotAdd){
         Cart::destroy();
      }
      if(!$isUpdate){
          if ($fashion->colors) {
              foreach ($fashion->colors as $key => $col) {
                  $color = $col;
                  break;
              }
          }
       if ($fashion->sizes) {
           foreach ($fashion->sizes as $key => $sa) {
               $size = $sa;
               break;
           }
       }

         foreach (trans('customer.fabrics') as $key => $fb) {
            $fabric = $fb;
            break;
         }
         Cart::add(['id' => $fashion->product_id, 'name' => $fashion->title, 'qty' => $qty, 'price' => $fashion->price, 'options' => ['custom' => '', 'image' => $fashion->image_path, 'designer' => $fashion->designer_id, 'colors' => $fashion->colors, 'sizes' => $fashion->sizes, 'color' => $color ?? '', 'size' => $size ?? '', 'fabric' => $fabric]]);
      }
      if($request->ajax()){
         return response()->json(['total' => Cart::subtotal()]);
      }else{
         return redirect()->route('customer.cart.index')->with('success', 'Item added to the cart');
      }
   }

   public function update(Request $request)
   {
      foreach ($request->cart as $key => $value) {
         $c = Cart::get($key);
         $opions = $c->options->toArray();
         $opions['custom'] = $value['custom'];
         $opions['color'] = $value['color'];
         $opions['size'] = $value['size'];
         $opions['fabric'] = $value['fabric'];
         Cart::update($key, ['qty' => $value['qty'], 'options' => $opions]);
      }
      return redirect()->route('customer.cart.index')->with('success', 'Cart has been updated');
   }

   public function destroy(Request $request)
   {
      Cart::remove($request->id);
      return redirect()->route('customer.cart.index')->with('success', 'Cart has been updated');
   }
}
