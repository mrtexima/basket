@inject('basket', 'App\Services\Basket')

@extends('layouts.main')

@section('pageTitle', $pageTitle)

@section('mainContent')
<div class="card">
    <div class="card-header bg-info" style="display:flex;justify-content:space-between;">
        <h4 class="card-title">{{$pageTitle}}</h4>
        <div>
            @if($basket->count() > 0)
            <a href="{{route('basket.clear')}}" class="btn btn-warning">خالی کرد سبد خرید</a>
            @endif
            <a href="{{route('basket.index')}}" class="btn btn-success">سبد خرید <span class="btn btn-danger">{{$basket->count()}}</span></a>
            <a href="{{route('dashboard')}}" class="btn btn-dark">داشبورد</a>
        </div>
    </div>
    <div class="card-body">
        <x-show-messages></x-show-messages>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>قیمت محصول</th>
                    <th>تعداد محصول</th>
                    <th>میزان تخفیف محصول</th>
                    <th>تاریخ ساخت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>نام محصول</th>
                    <th>قیمت محصول</th>
                    <th>تعداد محصول</th>
                    <th>میزان تخفیف محصول</th>
                    <th>تاریخ ساخت</th>
                    <th>عملیات</th>
                </tr>
            </tfoot>
            <tbody>
                @if($products->count() > 0)
                @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>
                        @if ($product->discount)
                        <del>{{number_format($product->price)}} ریال</del>
                        - {{number_format($product->calculatePrice)}} ریال
                        @else
                        {{number_format($product->price)}} ریال
                        @endif
                    </td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->getDiscount}}</td>
                    <td>{{$product->createdDate}}</td>
                    <td>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">ویرایش محصول</a>
                        <a href="{{route('basket.add', $product->id)}}" class="btn btn-secondary">اضافه کردن به سبد</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">محصولی موجود نیست</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection