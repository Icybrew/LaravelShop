@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-lg-3 col-xl-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('admin_menu')
@endcomponent
    </aside>
    <div class="col-lg-9 col-md-12 col-sm-12 row p-0 m-0 d-flex justify-content-start">
        products
    </div>
</div>
@endsection