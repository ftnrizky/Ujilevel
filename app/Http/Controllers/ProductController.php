<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Existing admin methods remain the same
    public function index()
    {
        $products = Product::getAllProduct();
        return view('backend.product.index', compact('products'));
    }

    // Add these new methods for frontend category filtering
    public function productByCategory(Request $request, $slug)
    {
        $category = Category::getProductByCat($slug);
        // if(!$category) {
        //     return redirect()->back()->with('error', 'Kategori tidak ada');
        // }

        $products = $category->products()->where('status', 'active');

        // Apply price filter if exists
        if ($request->price) {
            $price = explode('-', $request->price);
            $products->whereBetween('price', $price);
        }

        // Apply sorting
        if ($request->sort) {
            $sort = explode('-', $request->sort);
            $products = $products->orderBy($sort[0], $sort[1]);
        } else {
            $products = $products->orderBy('id', 'DESC');
        }

        $products = $products->paginate(12);
        $recent_products = Product::where('status', 'active')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        return view('frontend.pages.product-grids', [
            'products' => $products,
            'recent_products' => $recent_products,
            'category' => $category
        ]);
    }

    public function productBySubCategory(Request $request, $slug, $sub_slug)
    {
        $category = Category::getProductBySubCat($sub_slug);

        if (!$category) {
            return redirect()->back()->with('error', 'Subcategory not found');
        }

        $products = $category->sub_products()->where('status', 'active');

        // Apply price filter if exists
        if ($request->price) {
            $price = explode('-', $request->price);
            $products->whereBetween('price', $price);
        }

        // Apply sorting
        if ($request->sort) {
            $sort = explode('-', $request->sort);
            $products = $products->orderBy($sort[0], $sort[1]);
        } else {
            $products = $products->orderBy('id', 'DESC');
        }

        $products = $products->paginate(12);
        $recent_products = Product::where('status', 'active')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        return view('frontend.pages.product-grids', [
            'products' => $products,
            'recent_products' => $recent_products,
            'category' => $category
        ]);
    }

    // Remaining existing methods...
    public function create()
    {
        $brands = Brand::get();
        $categories = Category::where('is_parent', 1)->get();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'size' => 'nullable',
            'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'is_preOrder' => 'nullable',
            'estimated_days' => 'nullable|integer|min:1|required_if:is_preOrder,1',
        ]);

        $slug = generateUniqueSlug($request->title, Product::class);
        $validatedData['slug'] = $slug;
        $validatedData['is_featured'] = $request->input('is_featured', 0);
        $validatedData['is_preOrder'] = $request->input('is_preOrder', 0);

        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        $product = Product::create($validatedData);

        $message = $product
            ? 'Product Successfully added'
            : 'Please try again!!';

        return redirect()->route('product.index')->with(
            $product ? 'success' : 'error',
            $message
        );
    }

    public function edit($id)
    {
        $brands = Brand::get();
        $product = Product::findOrFail($id);
        $categories = Category::where('is_parent', 1)->get();
        $items = Product::where('id', $id)->get();

        return view('backend.product.edit', compact('product', 'brands', 'categories', 'items'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'size' => 'nullable',
            'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'is_preOrder' => 'nullable',
            'estimated_days' => 'nullable|integer|min:1|required_if:is_preOrder,1',
        ]);

        $validatedData['is_featured'] = $request->input('is_featured', 0);
        $validatedData['is_preOrder'] = $request->input('is_preOrder', 0);

        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        $status = $product->update($validatedData);

        $message = $status
            ? 'Product Successfully updated'
            : 'Please try again!!';

        return redirect()->route('product.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        $message = $status
            ? 'Product successfully deleted'
            : 'Error while deleting product';

        return redirect()->route('product.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }
}