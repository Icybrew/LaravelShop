@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-lg-3 col-xl-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('menu')
@endcomponent
    </aside>
    <div class="col-lg-9 col-md-12 col-sm-12 row p-0 m-0 d-flex justify-content-start">
@if(!empty($products) && count($products) > 0)
@foreach($products as $product)
        <div class="card col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0 my-1">
            <a href="{{route('product.show', $product->id) }}">
                <img src="{{ !empty($product->image) ? asset(config('shop.image.products') . $product->image) : asset(config('shop.image.default')) }}" class="card-img-top p-4" alt="{{$product->name}}" title="{{$product->name}}">
            </a>
@if($product->is_new)
            <div class="new">{!! __('product.title.new') !!}</div>
@endif
            <div class="card-body">
                <h5 class="card-title text-center"><a href="{{route('product.show', $product->id) }}">{{$product->name}}</a></h5>
                <p class="card-text text-center">${{$product->price}}</p>
@if($product->is_recommended)
                <p class="card-text text-center recommended">{!! __('product.title.recommended') !!}</p>
@endif
                <form action="{{route('cart.store')}}" method="post">
@csrf
                    <input type="hidden" name="quantity" value="1" required>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="product" value="{{$product->id}}">{!! __('product.button.cart_add') !!}</button>
                </form>
            </div>
        </div>
@endforeach
@else
        <h3 class="my-5 text-center mx-auto">{!! __('home.no_new_products') !!}</h3>
@endif
    </div>
</div>
@endsection