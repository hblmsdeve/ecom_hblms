<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Order;
use App\Models\order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $prod_id = $request->input('product_id');
        $product_check = Product::where('id', $prod_id)->where('status', '0')->first();
        if($product_check){
            $verified_purchase = Order::where('orders.user_id', Auth::id())
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->where('order_items.prod_id', $prod_id)->get();
            if ($verified_purchase->count() > 0) {
                $rate_exist = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                if($rate_exist){
                    $rate_exist->stars_rated = $stars_rated;
                    $rate_exist->update();
                }else{
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $prod_id,
                        'stars_rated' => $stars_rated,
                    ]);
                }
                return redirect()->back()->with('status', "Thank you for rating this product");        
            }else {
                return redirect()->back()->with('status', "You cannot rate a product without purchase");
            }
            
        }else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }
}
