@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('admin_menu')
@endcomponent
    </aside>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 my-2 mx-auto">
        <div class="col-12">
            <h1 class="text-center">{!! __('admin.categories.title') !!}</h1>
        </div>
@component('components.errors')
@endcomponent
@component('components.success')
@endcomponent
@if(!empty($categories) && count($categories) > 0)
        <ul class="list-group col-12 mx-auto">
@foreach($categories as $category)
            <li class="list-group-item d-flex">
                <div class="col-1 my-auto">{{ $category->id }}</div>
                <div class="my-auto">
                    <a href="{{ route('admin.categories.show', $category->id) }}" class="text-decoration-none">{{ $category->name }}</a>
                </div>
                <div class="col-2 my-auto">( {{ $category->products }} )</div>
                <div class="ml-auto d-flex">
                    <div class="mr-1">
                        <a href="{{ route('admin.categories.edit', $category->id) }}"><button type="button" class="btn btn-primary">{!! __('admin.button.edit') !!}</button></a>
                    </div>
                    <div class="ml-1">
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" name="delete">{!! __('admin.button.delete') !!}</button>
                        </form>
                    </div>
                </div>
            </li>
@endforeach
        </ul>
        <div class="text-center my-2 p-2">
            <a href="{{ route('admin.categories.create') }}"><button type="button" class="btn btn-success">{!! __('admin.categories.create.title') !!}</button></a>
        </div>
        <div class="mx-auto">
            {{ $categories->links() }}
        </div>
@endif
    </div>
</div>
@endsection