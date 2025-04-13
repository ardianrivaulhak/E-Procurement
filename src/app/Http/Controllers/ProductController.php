<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page', 1);

        $cacheKey = 'products_search_' . md5($search . '_page_' . $page);

        $products = cache()->remember($cacheKey, 60, function () use ($search) {
            return Product::search($search)->paginate(10);
        });

        return view('products.index', compact('products', 'search'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product added.');
    }
}
