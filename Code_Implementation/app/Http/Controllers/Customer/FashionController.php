<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Designer;
use App\Models\FashionDesign;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class FashionController extends Controller
{
   public function index(Request $request)
   {
      $fashions = FashionDesign::query();
      if($request->filled('w')){
         $fashions = $fashions->where('title', 'like', '%' . $request->w . '%');
      }
      if($request->filled('c')){
         $fashions = $fashions->where('category_id', $request->c);
      }
      if($request->filled('size')){
         $fashions = $fashions->whereJsonContains('sizes', $request->size);
      }
      if($request->filled('color')){
         $fashions = $fashions->whereJsonContains('colors', $request->color);
      }
      if($request->filled('fabric')){
         $fashions = $fashions->where('fabrics', $request->fabric);
      }
      if($request->filled('p')){
         $pp = explode('-', $request->p);
         $pf = isset($pp[0]) ? $pp[0] : 0;
         $pt = isset($pp[1]) ? $pp[1] : 0;
         $fashions = $pt ? $fashions->where('price', '>=', $pf)->where('price', '<=', $pt) : $fashions->where('price', '>=', $pf);
      }
      $fashions = $fashions->where('availability_status', 'available')->paginate(51);
      $cats     = Category::take(8)->get();
      return view('customer.fashions.index', compact('fashions', 'cats'));
   }

   public function fashion(FashionDesign $fashion)
   {
      abort_if($fashion->availability_status != 'available', 404);
       $similarFashions = FashionDesign::where('category_id', $fashion->category_id)
           ->where('product_id', '!=', $fashion->id)
           ->take(4)
           ->get();
      return view('customer.fashions.fashion', compact('fashion', 'similarFashions'));
   }

   public function designers(Request $request)
   {
      $designers = Designer::where('account_status', 'active')->paginate(51);
      return view('customer.fashions.designers', compact('designers'));
   }

   public function designer(Designer $designer)
   {
      abort_if($designer->account_status != 'active', 404);
      return view('customer.fashions.designer', compact('designer'));
   }
}
