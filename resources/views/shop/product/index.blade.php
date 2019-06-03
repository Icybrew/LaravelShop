@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-xl-3 col-lg-12 col-md-12 col-sm-12 border-left border-right mb-1">
@component('menu')
@endcomponent
    </aside>
@if(!empty($product))
    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 row p-0 mx-auto my-3 d-flex">
        <div class="position-relative col-xl-6 col-lg-12 col-md-12 col-sm-12">
            <img src="{{ !empty($product->image) ? asset(config('shop.image.products') . $product->image) : asset(config('shop.image.default')) }}" class="img-fluid rounded mx-auto d-block" alt="{{$product->name}}" title="{{$product->name}}">
@if($product->is_new)
            <div class="new">{!! __('product.title.new') !!}</div>
@endif
@if($product->is_recommended)
            <p class="recommended">{!! __('product.title.recommended') !!}</p>
@endif
        </div>
        <div class="col-xl-6 col-lg-10 col-md-10 col-sm-11 mx-auto">
            <div class="my-5">
                <h1 class="m-0">{{$product->name}}</h1>
                <p class="text-muted"><small>{!! __('product.title.code') !!}: {{ $product->code }}</small></p>
                <h2 class="text-primary">${{$product->price}}</h2>
                <div>
                    <form action="{{ route('cart.store')}}" method="post" class="row">
                        @csrf
                        <button id="productQuantityDecrement" type="button" class="btn btn-light mr-1 col-1">-</button>
                        <input id="productQuantity" type="number" class="form-control col-2" name="quantity" value="1" min="1" max="10" placeholder="{!! __('product.input.amount') !!}">
                        <button id="productQuantityIncrement" type="button" class="btn btn-light ml-1 col-1">+</button>
                        <button type="submit" class="btn btn-primary col-3 mx-1" name="product" value="{{$product->id}}">{!! __('product.button.cart_add') !!}</button>
                    </form>
                    <div class="my-2"><span class="font-weight-bold">{!! __('product.title.stock') !!}: </span>{{$product->availability}}</div>
                    <div class="my-2"><span class="font-weight-bold">{!! __('product.title.brand') !!}: </span>{{$product->brand}}</div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <h4>{!! __('product.title.description') !!}</h4>
            <p class="font-weight-light">{{$product->description}}</p>
        </div>
    </div>
@else
    <div class="mx-auto my-5 text-center">
        <h1 class="font-weight-bold">{!! __('product.404') !!}</h1>
        <a href="{{url()->previous()}}" class="d-inline-block mt-3"><button type="button" class="btn btn-lg btn-primary border">{!! __('product.button.back') !!}</button></a>
    </div>
@endif
</div>
@endsection