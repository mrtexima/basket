<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'discount',
    ];

    public function getGetDiscountAttribute()
    {
        if (!$this->discount) return 'بدون تخفیف ';

        return $this->discount . ' درصد';
    }

    public function getCreatedDateAttribute()
    {
        return Verta::instance($this->created_at)->format('d F Y H:i:s');
    }

    public function getCalculatePriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function hasQuantity(int $quantity)
    {
        return $this->quantity >= $quantity;
    }
}
