@extends('layout.main')

@section('title', $title)

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
  <span class="fs-6">
    {{ $news->created_at->diffForHumans() }}
  </span>
</div>

<article id="news-detail-page">
  <div class="mx-auto col-md-10 col-12">
    <div class="mb-3">
      <img class="rounded-2" src="/{{ $news->image }}" alt="{{ $news->title }}">
    </div>
    <p>{!! $news->content !!}</p>
  </div>
</article>

@endsection
