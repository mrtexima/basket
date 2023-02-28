@extends('layouts.main')

@section('pageTitle', $pageTitle)

@section('mainContent')
<div class="card">
    <div class="card-header bg-info" style="display:flex;justify-content:space-between;">
        <h4 class="card-title">{{$pageTitle}}</h4>
        <a href="{{route('dashboard')}}" class="btn btn-dark">داشبورد</a>
    </div>
    <div class="card-body">
        <x-show-messages></x-show-messages>
        <form action="{{route('product.store')}}" method="post" class="row">
            @csrf
            <div class="form-group col-md-4">
                <label for="name">نام محصول</label>
                <input type="text" name="name" id="name" placeholder="نام محصول" class="form-control" value="{{old('name')}}" >
            </div>
            <div class="form-group col-md-4">
                <label for="price">قیمت محصول (ریال)</label>
                <input type="number" min="0" name="price" id="price" placeholder="قیمت محصول" class="form-control" value="{{old('price')}}" >
            </div>
            <div class="form-group col-md-4">
                <label for="quantity">نعداد محصول (عدد)</label>
                <input type="number" min="0" name="quantity" id="quantity" placeholder="نعداد محصول" class="form-control" value="{{old('quantity')}}" >
            </div>
            <div class="form-group col-md-4">
                <label for="discount">تخفیف قیمت (درصد)</label>
                <input type="number" min="0" name="discount" id="discount" placeholder="تخفیف قیمت" class="form-control" value="{{old('discount')}}">
            </div>
            <hr>
            <button type="submit" class="btn btn-success col-2 mt-2">ثبت محصول</button>
        </form>
    </div>
</div>
@endsection