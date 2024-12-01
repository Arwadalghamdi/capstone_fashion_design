<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customization;
use App\Models\Designer;
use App\Models\FashionDesign;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    use UploadFile;

    public function index()
    {
       $customs = Customization::all();
       $counttt = 0;
       foreach ($customs as $c){
          $orItem = OrderItem::find($c->order_item_id);
           $pro = FashionDesign::where('product_id', $orItem->product_id)->where('designer_id', auth('designers')->id())->first();
           if ($pro) {
               $counttt += 1;
           }
       }
        $stats = [
            'customers'  => Customer::whereHas('orders', function($q){
                return $q->whereHas('items', function($qq){
                    return $qq->whereHas('fashionDesign', function($qqq){
                        return $qqq->where('designer_id', auth('designers')->id());
                    });
                });
            })->distinct()->count(),
            'designer'   =>$counttt,
            'fashion'    => FashionDesign::where('designer_id', auth('designers')->id())->count(),
            'orders'     => Order::where('designer_id', auth('designers')->id())->count(),
            'reviews'    => Review::where('designer_id', auth('designers')->id())->count()
        ];
        $reviews = Review::where('designer_id', auth('designers')->id())->latest('created_at')->take(6)->get();
        return view('designer.dashboard.index', compact('stats', 'reviews'));
    }

    public function getProfile()
    {
        $user = auth('designers')->user();
        return view('designer.profile.index', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $user = auth('designers')->user();
        $data = $request->validate([
                'name'              => 'required|string|max:255',
                'email'             => 'required|string|email|max:255|unique:designer,email,' . $user->id . ',designer_id',
                'phone'             => 'required|saudi_phone|unique:designer,phone,' . $user->id . ',designer_id',
                'address'           => 'required|max:100',
                'profile_picture'   => 'nullable|image',
                'bio'               => 'nullable|max:1000',
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

}
