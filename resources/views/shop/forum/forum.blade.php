@extends('layouts.main')

@section('content')
@component('components.errors')
@endcomponent
@component('components.success')
@endcomponent
@if(!empty($threads))
@if(count($threads) > 0)
<h1 class="text-center py-2">{{ $forum->name }}</h1>
<div class="position-relative col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto mb-5 border shadow">
    <div class="row py-2 border-bottom">
        <div class="col-10 font-weight-bold">{!! __('forum.thread.thread') !!}</div>
        <div class="col-2 font-weight-bold text-center">{!! __('forum.thread.author') !!}</div>
    </div>
    <div class="pb-5">
@foreach($threads as $thread)
        <div class="row py-2">
            <div class="col-10"><a href="{{ route('forum.thread.show', $thread->id) }}">{{ $thread->name }}</a></div>
            <div class="col-2 text-center"><a href="{{ route('profile.show', $thread->user_id) }}">{{ $thread->user_name }}</a></div>
        </div>
@endforeach
        <a href="{{ route('forum.index') }}" class="position-absolute forum-back"><button type="button" class="btn btn-sm btn-dark border">{!! __('forum.button.back') !!}</button></a>
@if(Auth::check())
        <a href="{{ route('forum.thread.create', $forum->id) }}" class="position-absolute forum-thread"><button type="button" class="btn btn-sm btn-primary border">{!! __('forum.thread.button.create_new') !!}</button></a>
@endif
@else
        <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto my-5 py-3 shadow text-center">
            <h1 class="text-center font-weight-bold">{!! __('forum.empty') !!}</h1>
@if(Auth::check())
            <a href="{{ route('forum.thread.create', $forum->id) }}" class="forum-thread d-inline-block mt-3"><button type="button" class="btn btn-lg btn-success border">{!! __('forum.thread.button.create_first') !!}</button></a>
@endif
        </div>
@endif
@else
        <div class="my-5 text-center">
            <h1 class="font-weight-bold">{!! __('forum.404') !!}</h1>
            <a href="{{ route('forum.index') }}" class="d-inline-block mt-3"><button type="button" class="btn btn-lg btn-primary border">{!! __('forum.back') !!}</button></a>
        </div>
    </div>
</div>
<div class="mx-auto">
    {{ $threads->links() }}
</div>
@endif
@endsection