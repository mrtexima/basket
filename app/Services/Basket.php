<?php

namespace App\Services;

use App\Exceptions\ProductQuentityException;
use App\Models\Product;

class Basket
{
    public function __construct(private StorageInterface $storage)
    {
        
    }

    public function add(Product $product, int $quantity)
    {
        if ($this->has($product)){
            $quantity = $this->get($product) + $quantity;
        }

        if (!$product->hasQuantity($quantity)){
            throw new ProductQuentityException;
        }
        
        return $this->storage->set($product->id, $quantity);
    }

    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }

    public function unset(Product $product)
    {
        return $this->storage->unset($product->id);
    }

    public function update(Product $product, $quantity)
    {
        return $this->storage->set($product->id, $quantity);
    }

    public function has(Product $product)
    {
        return $this->storage->has($product->id);
    }

    public function all()
    {
        $products = Product::find(array_keys($this->storage->all()));
        $products->each(function ($product){
            $product->basketQuantity = $this->storage->get($product->id);
        });
        return $products;
    }

    public function clear()
    {
        return $this->storage->clear();
    }

    public function count()
    {
        return $this->storage->count();
    }

    public function calculateAmount()
    {
        $total = 0;
        $products = $this->all();
        foreach ($products as $product){
            $total += $product->basketQuantity * ($product->calculatePrice);
        }
        return $total;
    }

    public function transferAmount()
    {
        return 200000;
    }
}