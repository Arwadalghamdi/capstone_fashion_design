<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\FashionDesign;
use App\Traits\UploadFile;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
   use UploadFile;

   public function index()
   {
      $user = auth('customers')->user();
      return view('customer.profile.index', compact('user'));
   }

   public function postProfile(Request $request)
    {
        $user = auth('customers')->user();
        $data = $request->validate([
                'name'              => 'required|string|max:255',
                'email'             => 'required|string|email|max:255|unique:customer,email,' . $user->id . ',customer_id',
                'phone'             => 'required|saudi_phone|unique:customer,phone,' . $user->id . ',customer_id',
                'address'           => 'required|max:100',
                'profile_picture'   => 'nullable|image',
                'password'          => 'nullable|string|min:8',
            ]);
        if(!$request->password){
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($request->password);
        }
        $data['profile_picture'] = $request->hasFile('profile_picture') && $request->profile_picture != '' ? $this->upload($request->profile_picture) : $user->profile_picture;
        $user->update($data);
        return redirect()->back()->with('success', 'Your profile has been updated');
    }

    public function orders()
    {
      $orders = auth('customers')->user()->orders;
      return view('customer.profile.orders', compact('orders'));
    }

    public function order($id)
    {
      $order = auth('customers')->user()->orders()->where('order_id', $id)->firstOrFail();
      return view('customer.profile.order', compact('order'));
    }

    public function review($id, Request $request)
    {
      $order   = auth('customers')->user()->orders()->where('order_id', $id)->firstOrFail();
      $fashion = $order->items()->where('product_id', $request->fashion)->firstOrFail();
      $review  = auth('customers')->user()->reviews()->where('product_id', $request->fashion)->where('order_id', $order->order_id)->first();
      abort_if($review != null, 404);
      return view('customer.profile.review', compact('order', 'fashion'));
    }

    public function doReview($id, Request $request)
    {
      $order   = auth('customers')->user()->orders()->where('order_id', $id)->firstOrFail();
      $fashion = $order->items()->where('product_id', $request->fashion)->firstOrFail();
      $review  = auth('customers')->user()->reviews()->where('product_id', $request->fashion)->where('order_id', $order->order_id)->first();
      abort_if($review != null, 404);
      $order->reviews()->create([
         'product_id'  => $fashion->product_id,
         'customer_id'        => auth('customers')->id(),
         'admin_id'           => 1,
         'designer_id'        => $fashion->fashionDesign?->designer_id,
         'rating'             => $request->rate,
         'comment'            => $request->comment
      ]);
      return redirect()->route('customer.profile.order', $order->id)->with('success', 'Thanks for review');
    }

}
