<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(ProductRequest $request)
    {
        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_' . $ext;

            $file->move('assets/uplouds/products/', $filename);
            $products->image = $filename;
        }

        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = Str::slug($request->name, '-');
        $products->smal_description = $request->input('smal_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');

        $products->status = $request->status == true ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';

        $products->meta_title = $request->input('meta_title');
        $products->meta_keyword = $request->input('meta_keyword');
        $products->meta_description = $request->input('meta_description');



        $products->save();

        return redirect('/product')->with('status', 'product berhasil ditambahkan');
    }



    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uplouds/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_' . $ext;

            $file->move('assets/uplouds/products/', $filename);
            $products->image = $filename;
        }

        $products->name = $request->input('name');
        $products->slug = Str::slug($request->name, '-');
        $products->smal_description = $request->input('smal_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->status  == true ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keyword = $request->input('meta_keyword');
        $products->meta_description = $request->input('meta_description');


        $products->update();
        return redirect('/product')->with('status', 'update data berhasil');
    }

    public function destroy($id)
    {
        $products = Product::find($id);

        if ($products->image) {
            $path = 'assets/uplouds/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('/product')->with('status', 'Data berhasil di hapus ');
    }
}
