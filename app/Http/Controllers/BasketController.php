<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductQuentityException;
use App\Models\Product;
use App\Services\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(private Basket $basket)
    {

    }

    public function index()
    {
        $pageTitle = 'سبد خرید';
        $items = $this->basket->all();
        
        return view('basket.index', compact('pageTitle', 'items'));
    }

    public function add(Product $product)
    {
        try {
            $this->basket->add($product, 1);

            return redirect()->back()->with('success', 'محصول به سب خرید اضاقه شد');
        }catch(\Throwable $e){
            if ($e instanceof ProductQuentityException){
                return redirect()->back()->with('faild', 'تعداد کالای انتخابی بیش از حد مچاز است');
            }else{
                return redirect()->back()->with('faild', 'حطای ناشناخته');
            }
        }
    }

    public function sub(Product $product)
    {
        if (!$this->basket->has($product)){
            return redirect()->back()->with('faild','این محصول در سبد کالایی شما نیست');
        }

        if ($this->basket->get($product) <= 1){
            $this->basket->unset($product);
            return redirect()->back()->with('success', 'کالا از لیست سبد شما حذف شد');
        }

        $this->basket->update($product, $this->basket->get($product) - 1);
        return redirect()->back()->with('success', 'تعداد کالا آپدیت شد');
    }
    
    public function unset(Product $product)
    {
        if (!$this->basket->has($product)){
            return redirect()->back()->with('faild','این محصول در سبد کالایی شما نیست');
        }
        
        $this->basket->unset($product);
        return redirect()->back()->with('success', 'کالا از سبد شما حذف شد');
    }

    public function clear()
    {
        $this->basket->clear();
        return redirect()->back()->with('success', 'سبد خالی شد');
    }
}
