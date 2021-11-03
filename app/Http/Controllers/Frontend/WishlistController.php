<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    public function add(Request $request)
    {
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            $prod_check = Product::where('id', $prod_id)->first();
            if(Product::find($prod_id)){
                if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $prod_check->name ." already added to Wishlist"]);
                }else{
                    $wish = new Wishlist();
                    $wish->prod_id = $prod_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' => $prod_check->name . " added to wishlist"]);
                }
            }else{
                return response()->json(['status' => "Product not exist"]);
            }
        }else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    public function deleteItem(Request $request)
    {
        if(Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                $wishlist = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => "Item remove from Wishlist"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        } 
    }
    public function wishlistCount()
    {
        $whishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $whishcount]);
    }
}
