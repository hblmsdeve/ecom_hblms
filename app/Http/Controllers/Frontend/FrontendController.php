<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $featured_products = Product::where('status', '0')->paginate(12); 
        $trending_category = Category::where('status', '1')->take(15)->get(); 
        return view('frontend.index',compact('featured_products', 'trending_category', 'sliders'));
    }
    public function category()
    {
        $category = Category::where('status', '0')->paginate(12);
        return view('frontend.category', compact('category'));
    }
    public function viewCategory($slug, Request $request)
    {
        if (Category::where('slug', $slug)->exists()) {
            $prod_id = $request->input('prod_id');
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->paginate(12);
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', "Slug doesnt exists");
        }
    }
    public function productView($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if(Product::where('slug', $prod_slug)->exists()){
                $products = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $user_ratings = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $reviews = Review::where('prod_id', $products->id)->get();
                if($ratings->count() > 0){
                    $rating_value = $rating_sum / $ratings->count();
                }else{
                    $rating_value = 0;
                }
                return view('frontend.products.view', compact('products', 'ratings', 'rating_value', 'user_ratings', 'reviews'));
            }else{
                return redirect('/')->with('status', "the link was broken");
            }
        }else{
            return redirect('/')->with('status', "No such category found");
        }
    }
}
