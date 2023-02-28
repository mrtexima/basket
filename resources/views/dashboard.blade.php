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
            </div>
        </div>
        <div class="card-body">
            <a href="{{route('product.create')}}" class="btn btn-secondary">ثبت محصول</a>
            <a href="{{route('product.list')}}" class="btn btn-secondary">لیست محصولات</a>
        </div>
    </div>
@endsection