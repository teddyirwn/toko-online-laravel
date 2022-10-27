<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index()
    {
        $category = category::paginate(5);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {



        $category = new category;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_' . $ext;

            $file->move('assets/uplouds/category/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->input('description');
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->meta_description = $request->input('meta_description');

        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';

        $category->save();

        return redirect('tcategory')->with('status', 'Category berhasil ditambahkan');
    }
    public function edit(category $category)
    {

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $category)
    {
        $category = category::findOrFail($category);


        if ($request->hasFile('image')) {
            $path = 'assets/uplouds/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_' . $ext;

            $file->move('assets/uplouds/category/', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->input('description');
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->meta_description = $request->input('meta_description');

        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->update();

        return redirect('tcategory')->with('status', 'update data berhasil');
    }

    public function destroy($category)
    {
        $category = category::findOrFail($category);

        if ($category->image) {
            $path = 'assets/uplouds/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('tcategory')->with('status', 'Data berhasil di hapus ');
    }
}
