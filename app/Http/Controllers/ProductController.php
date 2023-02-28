<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class ProductController extends Controller
{
    public function list()
    {
        $pageTitle = 'لیست محصولات';
        $products = Product::paginate(50);

        return view('product.list', compact('pageTitle', 'products'));
    }
    
    public function add()
    {
        $pageTitle = 'ایجاد محصول';

        return view('product.add', compact('pageTitle'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => abs(intval($request->price)),
            'quantity' => abs(intval($request->quantity)),
            'discount' => abs(intval($request->discount))
        ]);

        if ($product){
            return redirect()->back()->with('success', 'محصول مورد نظر با موفقیت ایجاد شد');
        }

        return redirect()->back()->with('faild', 'در ایجاد محصول خطایی رخ داده ، لطفا دوباره تلاش کنید');
    }
    
    public function edit(Product $product)
    {
        $pageTitle = 'ویرایش محصول';

        return view('product.edit', compact('pageTitle', 'product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        if ($request->name != $product->name){
            $product->name = $request->name;
        }
        if ($request->price != $product->price){
            $product->price = abs(intval($request->price));
        }
        if ($request->quantity != $product->quantity){
            $product->quantity = abs(intval($request->quantity));
        }
        if ($request->discount != $product->discount){
            $product->discount = abs(intval($request->discount)) ?? 0;
        }

        if ($product->save()){
            return redirect()->back()->with('success', 'محصول مورد نظر با موفقیت ویرایش شد');
        }

        return redirect()->back()->with('faild', 'در ویرایش محصول خطایی رخ داده ، لطفا دوباره تلاش کنید');
    }
}
