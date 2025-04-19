@extends('website.includes.master')


@section('content')
<div class="container text-center my-5">
    @if($fact)
        <h2 class="mb-4">{{ $fact->title }}</h2>
        <img src="{{ asset($fact->image_path) }}" alt="{{ $fact->title }}" style="max-width: 300px;">
        <p class="mt-3">{{ $fact->fact }}</p>
    @else
        <p>No veggie fact available for this week.</p>
    @endif
</div>
@endsection
