@extends('layouts.main')

@section('content')
<div>
    <div class="col-xl-10 col-lg-8 col-md-10 col-sm-12 mx-auto mt-3 mb-5">
@if($errors->any())
@foreach($errors->all() as $error)
        <div class="alert alert-danger col-xl-6 col-lg-8 col-md-10 col-sm-10 mx-auto text-center" role="alert">
            {{ $error }}
        </div>
@endforeach
@endif
@if(session('success'))
        <div class="alert alert-success col-xl-6 col-lg-8 col-md-10 col-sm-10 mx-auto text-center" role="alert">
            {{ session('success') }}
        </div>
@endif
@if(!empty($products) && count($products) > 0)
        <h1 class="text-center mt-3">{!! __('cart.title.head') !!}</h1>
        <ul class="list-group">
@foreach($products as $key => $product)
            <li class="list-group-item mb-1"><a href="{{route('product.show', $product->id) }}">{{ $product->name }}</a> - ${{ $product->price }} x {{ $product->quantity }} <form action="{{ route('cart.destroy') }}" method="post" class="d-inline   ">@csrf @method('DELETE')<button type="submit" class="close" name="product" value="{{ $key }}"><span class="text-danger" aria-hidden="true">{!! __('cart.button.remove') !!}</span></button></form></li>
@endforeach
        </ul>
        <div class="mt-2 text-center">
            <h4>{!! __('cart.title.total') !!}: $<?php echo array_sum(array_map(function ($item) { return $item->price * (($item->quantity > 0) ? $item->quantity : 1); }, $products)); ?></h4>
        </div>
        <a href="#"><button class="btn btn-block btn-primary">{!! __('cart.button.continue') !!}</button></a>
@else
        <div class="my-5">
            <h2 class="text-center">{!! __('cart.empty') !!}</h2>
        </div>
@endif
    </div>
</div>
@endsection