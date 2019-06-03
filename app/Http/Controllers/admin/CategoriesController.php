<?php

namespace shop\Http\Controllers\Admin;

use shop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use shop\ProductCategory;
use shop\Product;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::select('product_categories.*', DB::raw("count(products.id) as products"))
                ->leftJoin('products', 'products.category_id', '=', 'product_categories.id')
                ->groupBy('product_categories.id')
                ->orderBy('product_categories.id')
                ->paginate(9);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'image' => 'image|nullable|max:1000'
        ]);

        if (ProductCategory::where('name', $request->name)->first() === NULL) {

            $image = NULL;

            if ($request->hasFile('image')) {

                // Just extension
                $extension = $request->file('image')->getClientOriginalExtension();

                //Image name to save
                $image = ($request->name . '.' . $extension);

                // Finish upload
                $request->file('image')->storeAs(('public/' . config('shop.image.categories')), $image);
            }

            $category = new ProductCategory([
                'name' => $request->name,
                'image' => $image
            ]);

            try {
                $category->save();

                return redirect()->route('admin.categories.index')->with('success', __('admin.categories.create.success'));
            } catch (\Exception $ex) {
                return redirect()->route('admin.categories.create')->withErrors(new MessageBag(['Create category error']))->withInput();
            }
        } else {
            return redirect()->route('admin.categories.create')->withErrors(new MessageBag([__('admin.categories.create.duplicate')]))->withInput();
        }
    }

    public function show($id)
    {
        $category = ProductCategory::select('product_categories.*', DB::raw("count(products.id) as products"))
                ->leftJoin('products', 'products.category_id', '=', 'product_categories.id')
                ->where('product_categories.id', $id)
                ->groupBy('product_categories.id')
                ->first();

        if ($category !== NULL) {
            return view('admin.categories.category', compact('category'));
        } else {
            return abort(404);
        }

    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        if ($category !== NULL) {
            return view('admin.categories.edit', compact('category'));
        } else {
            return redirect()->route('admin.categories.index')->withErrors(new MessageBag([__('admin.categories.404')]));
        }
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|min:3'
        ]);
        
        $category = ProductCategory::find($id);
        
        if ($category !== NULL) {
            
            $category->name = $request->name;
            try {
                $category->save();
                return redirect()->route('admin.categories.index')->with('success', __('admin.categories.edit.success'));
            } catch (\Exception $ex) {
                return redirect()->route('admin.categories.index')->withErrors(new MessageBag(['Update category error']));
            }
            
        } else {
            return redirect()->route('admin.categories.index')->withErrors(new MessageBag([__('admin.categories.404')]));
        }
        
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if (Product::where('category_id', $category->id)->first() === NULL) {

            if ($category->image) {
                echo Storage::delete('public/' . config('shop.image.categories') . $category->image);
            }

            try {
                $category->delete();
            } catch (\Exception $ex) {
                return redirect()->route('admin.categories.index')->withErrors(new MessageBag(['Delete category error']));
            }

            return redirect()->route('admin.categories.index')->with('success', __('admin.categories.destroy.success'));
        } else {
            return redirect()->route('admin.categories.index')->withErrors(new MessageBag([__('admin.categories.destroy.not_empty')]));
        }
    }
}
