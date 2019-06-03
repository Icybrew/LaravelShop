@extends('layouts.main')

@section('content')
<h1 class="text-center py-2">{!! __('forum.title') !!}</h1>
<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto mb-5 border shadow">
@if(!empty($forums) && count($forums) > 0)
        <div class="row py-2 border-bottom">
            <div class="col-10 font-weight-bold">{!! __('forum.title') !!}</div>
            <div class="col-2 font-weight-bold text-center">{!! __('forum.thread.threads') !!}</div>
        </div>
@foreach($forums as $forum)
        <div class="row my-3">
                <div class="col-10"><a href="{{ route('forum.show', $forum->id) }}">{{ $forum->name }}</a></div>
                <div class="col-2 text-center">{{ $forum->threads }}</div>
        </div>
@endforeach
@else
        <h3 class="text-center font-weight-bold my-5">{!! __('forum.no_categories') !!}</h3>
@endif
</div>
@endsection