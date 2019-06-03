@extends('layouts.main')

@section('content')
@if(!empty($thread))
    <div class="position-relative col-xl-8 col-lg-10 col-md-10 col-sm-12 mx-auto my-5 py-3 shadow">
        <h1>{{ $thread->name }}</h1>
        <p class="font-weight-light">{{ date('M j, Y - G:i', strtotime($thread->created_at)) }} {!! __('forum.thread.title.by') !!}<a href="{{ route('profile.show', $thread->user_id) }}">{{ $thread->user_name }}</a></p>
        <p class="">{{ $thread->content }}</p>
        <div class="d-flex">
            <a href="{{ route('forum.show', $thread->forum_id) }}" class=""><button type="button" class="btn btn-sm btn-dark">{!! __('forum.button.back') !!}</button></a>
@can('destroy', $thread)
            <div class="ml-auto">
                <form action="{{ route('forum.thread.destroy', $thread->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">{!! __('forum.button.delete') !!}</button>
                </form>
@can('update', $thread)
                <a href="{{ route('forum.thread.edit', $thread->id) }}" class="ml-auto"><button type="button" class="btn btn-sm btn-primary">{!! __('forum.button.edit') !!}</button></a>
@endcan
            </div>
@endcan
        </div>
    </div>
@else
    <h1 class="text-center my-5">{!! __('forum.thread.404') !!}</h1>
@endif
@endsection