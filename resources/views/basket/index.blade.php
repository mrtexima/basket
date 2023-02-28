@extends('layouts.main')

@section('pageTitle', $pageTitle)

@section('mainContent')
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-info" style="display:flex;justify-content:space-between;">
                <h4 class="card-title">{{$pageTitle}}</h4>
                <a href="{{route('dashboard')}}" class="btn btn-dark">داشبورد</a>
            </div>
            <div class="card-body">
                <x-show-messages></x-show-messages>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>نام محصول</th>
                            <th>قیمت محصول</th>
                            <th>تعداد محصول</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>نام محصول</th>
                            <th>قیمت محصول</th>
                            <th>تعداد محصول</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($items->count() > 0)
                        @foreach($items as $product)
                        <tr>
                            <td>
                                <a href="{{route('basket.unset', $product->id)}}" class="btn btn-danger btn-sm">x</a>
                                {{$product->name}}</td>
                            <td>
                                @if ($product->discount)
                                <del>{{number_format($product->price)}} ریال</del>
                                - {{number_format($product->calculatePrice)}} ریال
                                @else
                                {{number_format($product->price)}} ریال
                                @endif
                            </td>
                            <td>
                                <a href="{{route('basket.add', $product->id)}}" class="btn btn-success btn-sm">+</a>
                                {{$product->basketQuantity}}
                                <a href="{{route('basket.sub', $product->id)}}" class="btn btn-warning btn-sm">-</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">محصولی موجود نیست</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <x-basket-amount></x-basket-amount>
    </div>
</div>
@endsection