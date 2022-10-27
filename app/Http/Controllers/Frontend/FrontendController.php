<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{

    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category'));
    }

    public function category()
    {


        $category = Category::where('status', '0')->take(15)->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {

        if (category::where('slug', $slug)->exists()) {
            $category = category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'slug doesnot exists');
        }
    }

    public function productview($cate_slug, $prod_slug)
    {

        if (category::where('slug', $cate_slug)->exists()) {
            if (product::where('slug', $prod_slug)->exists()) {
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('status', "The link was broken");
            }
        } else {
            return redirect('/')->with('status', "Nc such category found");
        }
    }

    public function listproductajax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searchproduct(Request $request)
    {
        $searched_product = $request->product_name;

        if ($searched_product != "") {

            $product = Product::where('name', "LIKE", "$searched_product%")->first();
            if ($product) {
                return redirect('category/' . $product->category->slug . '/' . $product->slug);
            } else {
                return redirect()->back()->with('status', 'tidak ada product');
            }
        } else {
            return redirect()->back();
        }
    }
}
