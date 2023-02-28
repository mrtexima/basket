<?php

namespace App\View\Components;

use App\Services\Basket;
use Illuminate\View\Component;

class BasketAmount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $basket = resolve(Basket::class);
        return view('components.basket-amount', compact('basket'));
    }
}
