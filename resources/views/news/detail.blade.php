@extends('layout.main')

@section('title', $title)

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
</div>

<article id="news-detail-page">
  {{ $news->created_at->diffForHumans() }}
  <img src="/{{ $news->image }}" alt="">
  <p>{{ $news->content }}</p>
</article>

@endsection
