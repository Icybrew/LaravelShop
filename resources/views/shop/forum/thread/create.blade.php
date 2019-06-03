@extends('layouts.main')

@section('content')
<h1 class="text-center py-2">{!! __('forum.thread.title.create') !!}</h1>
@component('components.errors')
@endcomponent
<div class="position-relative col-xl-5 col-lg-6 col-md-8 col-sm-11 mx-auto pb-4 mb-5 shadow">
    <form action="{{ route('forum.thread.store', $forum->id) }}" method="post">
        @csrf
        <div class="form-group mt-3">
            <input type="text" name="title" class="form-control" placeholder="{!! __('forum.input.title') !!}" required>
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="{!! __('forum.input.content') !!}" required></textarea>
        </div>
        <div class="form-group text-center pb-1">
            <button class="btn btn-sm btn-primary position-absolute forum-thread">{!! __('forum.thread.button.create') !!}</button>
        </div>
    </form>
    <a href="{{ route('forum.show', $forum->id) }}" class="position-absolute m-1 forum-back"><button type="button" class="btn btn-sm btn-dark">{!! __('forum.button.back') !!}</button></a>
</div>
@endsection