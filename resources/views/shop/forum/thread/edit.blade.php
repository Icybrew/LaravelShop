@extends('layouts.main')

@section('content')
<h1 class="text-center py-2">{!! __('forum.thread.title.edit') !!}</h1>
<div class="position-relative col-xl-5 col-lg-6 col-md-8 col-sm-11 mx-auto pb-4 mb-5 shadow">
    <form action="{{ route('forum.thread.update', $thread->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $thread->name }}" placeholder="{!! __('forum.input.title') !!}" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="{!! __('forum.input.content') !!}" required>{{ old('content') ? old('content') : $thread->content }}</textarea>
        </div>
        <div class="form-group text-center pb-1">
            <button class="btn btn-sm btn-primary position-absolute forum-thread">{!! __('forum.button.confirm') !!}</button>
        </div>
    </form>
    <a href="{{ route('forum.thread.show', $thread->id) }}" class="position-absolute m-1 forum-back"><button type="button" class="btn btn-sm btn-dark">{!! __('forum.button.back') !!}</button></a>
</div>
@endsection